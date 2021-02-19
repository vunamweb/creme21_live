<?php
/**
  * You are allowed to use this API in your web application.
 *
 * Copyright (C) 2018 by customweb GmbH
 *
 * This program is licenced under the customweb software licence. With the
 * purchase or the installation of the software in your application you
 * accept the licence agreement. The allowed usage is outlined in the
 * customweb software licence which can be found under
 * http://www.sellxed.com/en/software-license-agreement
 *
 * Any modification or distribution is strictly forbidden. The license
 * grants you the installation in one application. For multiuse you will need
 * to purchase further licences at http://www.sellxed.com/shop.
 *
 * See the customweb software licence agreement for more details.
 *
 */

require_once DIR_SYSTEM . '/library/cw/SaferpayCw/init.php';

require_once 'Customweb/Licensing/SaferpayCw/License.php';
require_once 'Customweb/IForm.php';
require_once 'Customweb/Form.php';

require_once 'SaferpayCw/Language.php';
require_once 'SaferpayCw/Util.php';
require_once 'SaferpayCw/SettingApi.php';
require_once 'SaferpayCw/Form/BackendRenderer.php';
require_once 'SaferpayCw/AbstractController.php';
require_once 'SaferpayCw/Store.php';


class SaferpayCw_AbstractModuleController extends SaferpayCw_AbstractController
{
	
	protected function getModuleBasePath() {
		return 'module/saferpaycw';
	}
	
	protected function getModuleParentPath() {
		return 'marketplace/extension';	
	}
	
	public function index()
	{
		$this->load->model('saferpaycw/setting');

		$data = array();
		
		// Store the configuration
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_saferpaycw_setting->saveSettings(new SaferpayCw_SettingApi('module_saferpaycw'), $this->request->post);
			$data['success'] = SaferpayCw_Language::_("Save was successful.");
		}

		$this->document->addStyle('view/stylesheet/saferpaycw.css');
		$this->document->addScript('view/javascript/saferpaycw.js');

		$heading = SaferpayCw_Language::_("Main Configurations for Saferpay");
		$this->document->setTitle($heading);
		
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_home'),
				'href'      => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL'),
				'separator' => false
		);

		$data['breadcrumbs'][] = array(
				'text'      => SaferpayCw_Language::_('Modules'),
				'href'      => $this->url->link($this->getModuleParentPath(), 'type=module&user_token=' . $this->session->data['user_token'], 'SSL'),
				'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
				'text'      => SaferpayCw_Language::_("Main Configurations for Saferpay"),
				'href'      => $this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL'),
				'separator' => ' :: '
		);


		$data['heading_title'] = $heading;
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		
		if (isset($this->request->post['module_category_status'])) {
			$data['module_category_status'] = $this->request->post['module_category_status'];
		} else {
			$data['module_category_status'] = $this->config->get('module_category_status');
		}

		$data['action'] = $this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL');
		$data['cancel'] = $this->url->link($this->getModuleParentPath(), 'type=module&user_token=' . $this->session->data['user_token'], 'SSL');

		$data['more_link'] = $this->url->link($this->getModuleBasePath() . '/form_overview', 'user_token=' . $this->session->data['user_token'], 'SSL');

		$data['tabs'] = $this->model_saferpaycw_setting->renderStoreTabs($this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL'));

		$info = $this->model_saferpaycw_setting->render(new SaferpayCw_SettingApi('module_saferpaycw'));
		
		require_once 'Customweb/Licensing/SaferpayCw/License.php';
Customweb_Licensing_SaferpayCw_License::run('kk5lomjqtkout2ch');
		
		if (version_compare(VERSION, '2.0.0.0') >= 0) {
			$this->document->addScript('view/javascript/bootstrap-tab.min.js');
		}
		
		$data['form'] = $info;
		$data['text_edit'] = $heading;
		
		$this->response->setOutput($this->renderView('saferpaycw/main_settings', $data, array(
			'common/header',
			'common/footer',
		)));
	}
	

	private function validate()
	{
		if (!$this->user->hasPermission('modify', $this->getModuleBasePath())) {
			// magic getter is by value, thus setting a key as $this->error['warning'] = 'foo' will not work
			$error = $this->error;
			$error['warning'] = $this->language->get('error_permission');
			$this->error = $error;
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	public function form_overview() {
		$data = array();
		if (isset($_POST['storeId'])) {
			$_SESSION['currentSaferpayCwStoreId'] = $_POST['storeId'];
			$data['success'] = SaferpayCw_Language::_("Store has been changed.");
		}
		
		$this->handleStoreSelection();
		
		$this->document->addStyle('view/stylesheet/saferpaycw_form.css');
		
		$heading = SaferpayCw_Language::_("Saferpay");
		$this->document->setTitle($heading);

		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => false
		);

		$data['breadcrumbs'][] = array(
			'text'      => SaferpayCw_Language::_('Modules'),
			'href'      => $this->url->link($this->getModuleParentPath(), 'type=module&user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$data['breadcrumbs'][] = array(
			'text'      => SaferpayCw_Language::_("Saferpay"),
			'href'      => $this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);

		$data['back'] = $this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['current_store_id'] = SaferpayCw_Store::getStoreId();
		$data['stores'] = SaferpayCw_Store::getStores();

		$forms = array();
		$adapter = $this->getBackendFormAdapter();
		if ($adapter !== null) {
			$forms = $adapter->getForms();
		}
		$data['forms'] = $forms;
		
		$data['heading_title'] = $heading;
		
		if (!isset($data['success'])) {
			$data['success'] = false;
		}
		
		$data['url'] = $this->url;
		$data['module_base_path'] = $this->getModuleBasePath();
		$data['user_token'] = $this->session->data['user_token'];
		
		$this->response->setOutput($this->renderView('saferpaycw/form/overview', $data, array(
			'common/header',
			'common/footer',
		)));
		
	}

	public function form_view($data = array()) {
		if (isset($_POST['storeId'])) {
			$_SESSION['currentSaferpayCwStoreId'] = $_POST['storeId'];
			$data['success'] = SaferpayCw_Language::_("Store has been changed.");
		}
		
		$this->handleStoreSelection();
		$form = $this->getCurrentForm();
		
		$this->document->addStyle('view/stylesheet/saferpaycw_form.css');
		
		$heading = SaferpayCw_Language::_("Saferpay") . ': ' . $form->getTitle();
		$this->document->setTitle($heading);
		
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => false
		);

		$data['breadcrumbs'][] = array(
				'text'      => SaferpayCw_Language::_('Modules'),
				'href'      => $this->url->link($this->getModuleParentPath(), 'type=module&user_token=' . $this->session->data['user_token'], 'SSL'),
				'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
			'text'      => SaferpayCw_Language::_("Saferpay"),
			'href'      => $this->url->link($this->getModuleBasePath(), 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
			'text'      => SaferpayCw_Language::_("More"),
			'href'      => $this->url->link($this->getModuleBasePath() . '/form_overview', 'user_token=' . $this->session->data['user_token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$data['back'] = $this->url->link($this->getModuleBasePath() . '/form_overview', 'user_token=' . $this->session->data['user_token'], 'SSL');
		
		$data['stores'] = SaferpayCw_Store::getStores();
		
		if ($form->isProcessable()) {
			$form = new Customweb_Form($form);
			$form->setTargetUrl($this->url->link($this->getModuleBasePath() . '/form_save', 'user_token=' . $this->session->data['user_token'] . '&form=' . $form->getMachineName(), 'SSL'))->setRequestMethod(Customweb_IForm::REQUEST_METHOD_POST);
		}
		
		$data['current_store_id'] = SaferpayCw_Store::getStoreId();
		
		$renderer = new SaferpayCw_Form_BackendRenderer();
		$data['form'] = $form;
		$data['formHtml'] = $renderer->renderForm($form);
		
		$data['heading_title'] = $heading;
		
		if (!isset($data['success'])) {
			$data['success'] = false;
		}
		
		$data['url'] = $this->url;
		$data['user_token'] = $this->session->data['user_token'];
		
		$this->response->setOutput($this->renderView('saferpaycw/form/view', $data, array(
			'common/header',
			'common/footer',
		)));
		
	}
	
	public function form_save() {
		$this->handleStoreSelection();
		$form = $this->getCurrentForm();
		
		$params = $_REQUEST;
		if (isset($params['pressed_button']) || isset($params['button'])) {
			$pressedButton = null;
			if (isset($params['pressed_button'])) {
				$buttonName = $_REQUEST['pressed_button'];
				foreach ($form->getButtons() as $button) {
					if ($button->getMachineName() == $buttonName) {
						$pressedButton = $button;
					}
				}
			}
			else if (isset($params['button'])) {
				$pressedButton = null;
				foreach ($params['button'] as $buttonName => $value) {
					foreach ($form->getButtons() as $button) {
						if ($button->getMachineName() == $buttonName) {
							$pressedButton = $button;
						}
					}
				}
			}
			
			if ($pressedButton === null) {
				throw new Exception("Could not find pressed button.");
			}
			$this->getBackendFormAdapter()->processForm($form, $pressedButton, $params);
		}
		$this->form_view(array('success' => SaferpayCw_Language::_('Successful saved.')));
	}
	
	/**
	 * @return Customweb_IForm
	 */
	private function getCurrentForm() {
		$adapter = $this->getBackendFormAdapter();
	
		if ($adapter !== null && isset($_GET['form'])) {
			$forms = $adapter->getForms();
			$formName = $_GET['form'];
			$currentForm = null;
			foreach ($forms as $form) {
				if ($form->getMachineName() == $formName) {
					return $form;
				}
			}
		}
	
		die('No form is set.');
	}
	
	/**
	 * @return Customweb_Payment_BackendOperation_Form_IAdapter
	 */
	private function getBackendFormAdapter() {
		try {
			return SaferpayCw_Util::getContainer()->getBean('Customweb_Payment_BackendOperation_Form_IAdapter');
		}
		catch(Customweb_DependencyInjection_Exception_BeanNotFoundException $e) {
			return null;
		}
	}
	
	private function handleStoreSelection() {
		$currentStoreId = SaferpayCw_Store::getStoreId();
		if (isset($_SESSION['currentSaferpayCwStoreId'])) {
			$currentStoreId = $_SESSION['currentSaferpayCwStoreId'];
			SaferpayCw_Store::forceStoreId($currentStoreId);
		}
	}


	public function install() {
				
		$modificationName = 'saferpaycw';
		$rs = SaferpayCw_Util::getDriver()->query("SELECT * FROM " . DB_PREFIX . "modification WHERE name = >name");
		$rs->execute(array('>name' => $modificationName));
		if ($rs->fetch() !== false) {
			//Delete existing modification otherwise it will never be updated
			$rs = SaferpayCw_Util::getDriver()->query("DELETE IGNORE FROM " . DB_PREFIX . "modification WHERE name = >name");
			$rs->execute(array('>name' => $modificationName));				
		}
		$this->load->model('setting/modification');
		$data = array(
			'name' => $modificationName,
			'extension_install_id' => 'module_saferpaycw',
			'author' => 'customweb ltd',
			'version' => '1.0.0',
			'link' => 'https://www.sellxed.com',
			'status' => '1',
			'code' => 'module_saferpaycw',
			'xml' => file_get_contents(DIR_SYSTEM . '/library/cw/SaferpayCw/Modification/saferpaycw.xml'),
		);
		$this->model_setting_modification->addModification($data);
		SaferpayCw_Util::migrate();
		SaferpayCw_Util::getDriver()->query("INSERT INTO " . DB_PREFIX . "setting (`store_id`, `code`, `key`, `value`, `serialized`) VALUES (0, 'module_saferpaycw', 'module_saferpaycw_status', 1, 0);")->execute();
		
		$this->session->data['success']  = SaferpayCw_Language::_("Please refresh the modifications <a href='".$this->url->link("marketplace/modification", "user_token=".$this->session->data['user_token'])."'>here</a> before you configure the module");
		$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'].'&type=module'));
		
	}

	public function uninstall() {
		SaferpayCw_Util::getDriver()->query("DELETE FROM " . DB_PREFIX . "setting WHERE `code`='module_saferpaycw' AND `key`='module_saferpaycw_status';")->execute();
	}
	
	
}