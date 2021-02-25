<?php
class ControllerProductCategory extends Controller
{
	public function index()
	{
		//echo "namzz"; die();
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['category_text'] = $this->language->get('text_category');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.model';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}


		$data['text_empty'] = $this->language->get('text_empty');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}
			}
		} else {
			$category_id = 0;
		}


		/* Edit for Layered Navigation */
		if (!empty($_SERVER['HTTPS'])) {
			// SSL connection
			$base_url = str_replace('http', 'https', $this->config->get('config_url'));
		} else {
			$base_url = $this->config->get('config_url');
		}

		$category_info = $this->model_catalog_category->getCategory($category_id);
		//print_r($category_info); die();

		if ($category_info) {
			$this->document->setTitle($category_info['meta_title']);
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);

			$data['heading_title'] = $category_info['name'];

			$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

			// Set the last category breadcrumb
			$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
			} else {
				$data['thumb'] = 'http://mytexmask.ch/mymask/catalog/view/theme/tt_naturecircle2/images/1x/bg_top.png';
			}

			$data['compare'] = $this->url->link('product/compare');

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			//echo $category_id; die();
			$results = $this->model_catalog_category->getCategories($category_id);
			//echo count($results);
			if(count($results) == 0)
			  $results[0] = $this->model_catalog_category->getCategory($category_id);
			//print_r($results[0]); die();


			/* Get new product */
			$this->load->model('catalog/product');

			$data['new_products'] = array();

			$filter_data = array(
				'sort'  => 'p.date_added',
				'order' => 'DESC',
				'start' => 0,
				'limit' => 10
			);

			$new_results = $this->model_catalog_product->getProducts($filter_data);
			/* End */

			foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

				$data['categories'][] = array(
					'id' => $result['category_id'],
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'name_1' => $result['name'],
					'href'  => $base_url . 'index.php?route=product/category&path=' . $result['category_id'] . $url
				);
			}

			$data['product_attribute'] = $this->model_catalog_product->getAllAttribute();
			$data['header_images'] = $this->model_catalog_product->getHeaderImageCategory($category_id);
			//print_r($data['header_images']); die();
			//echo $category_id; die();
			//print_r($data['product_attribute']); die();

			$data['products'] = array();

			/*$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);*/

			for ($i = 0; $i < count($data['categories']); $i++) {
				$filter_data = array(
					'filter_category_id' => $data['categories'][$i]['id'],
					'filter_filter'      => $filter,
					'sort'               => 'p.sort_order', //$sort,
					'order'              => $order,
					'start'              => ($page - 1) * $limit,
					'limit'              => $limit
				);
				//echo $sort; die();

				$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

				$results = $this->model_catalog_product->getProducts($filter_data);
				//echo $results[0]['sort_order']; die();
				//print_r($results); die();

				/* Get new product */
				$this->load->model('catalog/product');

				$data['new_products'] = array();

				$filter_data = array(
					'sort'  => 'p.date_added',
					'order' => 'DESC',
					'start' => 0,
					'limit' => 10
				);

				$new_results = $this->model_catalog_product->getProducts($filter_data);

				$data['products'][$i][0]['name'] = $data['categories'][$i]['name_1'];
				$data['products'][$i][0]['category_id'] = $data['categories'][$i]['id'];

				foreach ($results as $result) {
					if ($result['image']) {
						$image = 'image/' . $result['image'];
						//$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
					} else {
						$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
					}

					if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
						$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					} else {
						$price = false;
					}

					if ((float)$result['special']) {
						$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
						$rate_special = round(100 - ((float)$result['special'] / $result['price'] * 100));
					} else {
						$special = false;
						$rate_special = false;
					}

					if ($this->config->get('config_tax')) {
						$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
					} else {
						$tax = false;
					}

					if ($this->config->get('config_review_status')) {
						$rating = (int)$result['rating'];
					} else {
						$rating = false;
					}


					$is_new = false;
					if ($new_results) {
						foreach ($new_results as $new_r) {
							if ($result['product_id'] == $new_r['product_id']) {
								$is_new = true;
							}
						}
					}
					if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
						$price_num = $this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax'));
					} else {
						$price_num = false;
					}

					if ((float)$result['special']) {
						$special_num = $this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax'));
					} else {
						$special_num = false;
					}
					/// Product Rotator /
					$store_id = $this->config->get('config_store_id');

					$product_rotator_status = (int) $this->config->get('module_octhemeoption_rotator')[$store_id];
					if ($product_rotator_status == 1) {
						$this->load->model('catalog/ocproductrotator');
						$this->load->model('tool/image');

						$product_id = $result['product_id'];
						$product_rotator_image = $this->model_catalog_ocproductrotator->getProductRotatorImage($product_id);

						if ($product_rotator_image) {
							$rotator_image = $this->model_tool_image->resize($product_rotator_image, $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
						} else {
							$rotator_image = false;
						}
					} else {
						$rotator_image = false;
					}
					/// End Product Rotator /

					$c_words = 250;
					$result['name'] = strlen($result['name']) > $c_words ? substr($result['name'], 0, $c_words) . "..." : $result['name'];
					$result['name'] = explode('#', $result['name']);


					// BJOERN ADD SHOW PIECES IN BOX + + + + + + + + + + + + + + + + + + + + + + + + + + + 
					$pieces_in_box = $result['sku']; // {{ product.sku }}er Set
					if ($pieces_in_box > 1) $pieces_in_box = ' / ' . $pieces_in_box . 'er Set';
					else $pieces_in_box = '';
					// + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + + 

					// BJOERN ADD QUANTITY AND STOCK 
					$datas_ = $this->model_catalog_product->getProductOptions_($result['product_id']);

					if (count($datas_) == 0)
						$quantity = $result['quantity'];
					else {
						foreach ($datas_ as $data_) {
							if ($data_['value'] == 'Grösse') {
								$options_ = $data_['option'];
								$quantity = 0;

								foreach ($options_ as $option_) {
									$quantity = $quantity + $option_['quantity'];
									//$result .= '<p class="head-child">'.$option['value'].': '.$option['quantity'].' </p>';
								}
							}
						}
					}

					//$quantity = $result['quantity'];
					$shipped = $this->model_catalog_product->getTotalProductNotSipped($result['product_id']);
					if ($quantity > 0)
						$quantity = $quantity - $shipped;

					if ($quantity > 0) $stock = 7;
					else $stock = 6;

					$stock_square = '<span class="status' . ($quantity > 0 ? ' onstock' : '') . '"></span>';

					$attributeProduct = $this->model_catalog_product->getAttributeProduct($result['product_id']);

					$data['products'][$i][] = array(
						'is_new'      => $is_new,
						//'rotator_image' => $rotator_image,
						'rotator_image' => 'image/' . $result['product_rotator_image'],
						'price_num'       => $price_num,
						'special_num'     => $special_num,
						'manufacturer' => $result['manufacturer'],
						'manufacturers' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),

						'product_id'  => $result['product_id'],
						'product_type' => $result['type_product'],
						'product_attribute' => $attributeProduct,
						'category_id' => $data['categories'][$i]['id'],
						'thumb'       => $image,
						'name_1'        => $result['name'][0],
						'name_2'        => $result['name'][1],
						'stock'        => $result['stock_status'],
						'stock_square'  => $stock_square,
						'quantity'        => $result['quantity'],
						//'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
						'description' => html_entity_decode($result['description']),
						'price'       => $price,
						'sku'       => $pieces_in_box,
						'special'     => $special,
						'rate_special' => $rate_special,
						'tax'         => $tax,
						'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
						'rating'      => $result['rating'],
						'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
					);
				}
			}

			//print_r($data['products']); die();
			//print_r($data['products'][1][0]);

			$this->optimize($data['products']);

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['sorts'] = array();

			/*
            $data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=p.sort_order&order=ASC' . $url
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=pd.name&order=ASC' . $url
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=pd.name&order=DESC' . $url
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=p.price&order=ASC' . $url
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=p.price&order=DESC' . $url
			);

			if ($this->config->get('config_review_status')) {
				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=rating&order=DESC' . $url
				);

				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=rating&order=ASC' . $url
				);
			}*/

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=p.model&order=ASC' . $url
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . '&sort=p.model&order=DESC' . $url
			);

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach ($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $base_url . 'index.php?route=product/category&path=' . $category_id . $url . '&limit=' . $value
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $base_url . 'index.php?route=extension/module/oclayerednavigation/category&path=' . $category_id . $url . '&page={page}';

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . $page), 'canonical');
			}

			if ($page > 1) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . (($page - 2) ? '&page=' . ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page=' . ($page + 1)), 'next');
			}

			$data['sort'] = $sort;
			$data['order'] = $order;

			/* Edit for Layered Navigation Ajax Module */
			$module_status = $this->config->get('module_oclayerednavigation_status');
			if ($module_status) {
				// $this->document->addScript('catalog/view/javascript/jquery/jquery-ui.min.js');
				$this->document->addStyle('catalog/view/javascript/jquery/css/jquery-ui.min.css');

				if (file_exists(DIR_TEMPLATE . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/stylesheet/opentheme/oclayerednavigation/css/oclayerednavigation.css')) {
					$this->document->addStyle('catalog/view/theme/' . $this->config->get('theme_' . $this->config->get('config_theme') . '_directory') . '/stylesheet/opentheme/oclayerednavigation/css/oclayerednavigation.css');
				} else {
					$this->document->addStyle('catalog/view/theme/default/stylesheet/opentheme/oclayerednavigation/css/oclayerednavigation.css');
				}

				$this->document->addScript('catalog/view/javascript/opentheme/oclayerednavigation/oclayerednavigation.js');
			}




			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			//print_r($data['products']); die();


			/* Edit for Layered Navigation Ajax Module */
			if ($module_status) {
				$data['module_oclayerednavigation_loader_img'] = $base_url . 'image/' . $this->config->get('module_oclayerednavigation_loader_img');
				if ($category_info['column'] == '') {
					//echo "a"; die();
				   $this->response->setOutput($this->load->view('extension/module/oclayerednavigation/occategory', $data));
					
				}
				else {
					//echo "b"; die();
					$this->response->redirect('../'.$category_info["column"].'');
					//$data['description'] = file_get_contents('include/' . $category_info['column'] . '.php'); //html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
					//$this->response->setOutput($this->load->view('product/category', $data));
				}
			} else {
                echo "ddzz"; die();
				$this->response->setOutput($this->load->view('product/category', $data));
			}
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/category', $url)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function optimize(&$dataProducts)
	{
		for ($i = 0; $i < count($dataProducts); $i++)
			if (count($dataProducts[$i]) == 6) {
				$dataProducts[$i][6] = $dataProducts[$i][5];
				$dataProducts[$i][6]['thumb'] = 'image/catalog/Creme_Smiley.png';
				$dataProducts[$i][6]['class'] = 'rest';
			}
	}
}
