<?php

class ControllerCheckoutCart extends Controller
{
    public function index()
    {
        $this->load->language('checkout/cart');

        $this->document->setTitle($this->language->get('heading_title'));

        $data['text_empty'] = $this->language->get('text_empty');


        $data['heading_title'] = $this->language->get('heading_title');

        $data['sub_total'] = $this->language->get('sub_total');
        $data['tax'] = $this->language->get('tax');
        $data['total'] = $this->language->get('total');
        $data['text_1'] = $this->language->get('text_1');
        $data['text_2'] = $this->language->get('text_2');

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array('href' => $this->url->link('common/home'), 'text' =>
                $this->language->get('text_home'));

        $data['breadcrumbs'][] = array('href' => $this->url->link('checkout/cart'),
                'text' => $this->language->get('heading_title'));

        if ($this->cart->hasProducts() || !empty($this->session->data['vouchers']))
        {
            if (!$this->cart->hasStock() && (!$this->config->get('config_stock_checkout') ||
                $this->config->get('config_stock_warning')))
            {
                $data['error_warning'] = $this->language->get('error_stock');
            } elseif (isset($this->session->data['error']))
            {
                $data['error_warning'] = $this->session->data['error'];

                unset($this->session->data['error']);
            } elseif (!$this->checkMixMask())
            {
                $data['error_warning'] = $this->language->get('error_mix_mask');
            } else
            {
                $data['error_warning'] = '';
            }

            if ($this->config->get('config_customer_price') && !$this->customer->isLogged())
            {
                $data['attention'] = sprintf($this->language->get('text_login'), $this->url->
                    link('account/login'), $this->url->link('account/register'));
            } else
            {
                $data['attention'] = '';
            }

            if (isset($this->session->data['success']))
            {
                $data['success'] = $this->session->data['success'];

                unset($this->session->data['success']);
            } else
            {
                $data['success'] = '';
            }

            $data['action'] = $this->url->link('checkout/cart/edit', '', true);

            if ($this->config->get('config_cart_weight'))
            {
                $data['weight'] = $this->weight->format($this->cart->getWeight(), $this->config->
                    get('config_weight_class_id'), $this->language->get('decimal_point'), $this->
                    language->get('thousand_point'));
            } else
            {
                $data['weight'] = '';
            }

            $this->load->model('tool/image');
            $this->load->model('tool/upload');
            $this->load->model('catalog/product');
            
            $data['products'] = array();

            $products = $this->cart->getProducts();
            //print_r($products); die();

            foreach ($products as $product)
            {
                //print_r($product); die();
                $type_product = $this->model_catalog_product->getTypeProduct($product['product_id']);

                $product_total = 0;

                foreach ($products as $product_2)
                {
                    if ($product_2['product_id'] == $product['product_id'])
                    {
                        $product_total += $product_2['quantity'];
                    }
                }

                if ($product['minimum'] > $product_total)
                {
                    $data['error_warning'] = sprintf($this->language->get('error_minimum'), $product['name'],
                        $product['minimum']);
                }

                if ($product['image'])
                {
                    $image = $this->model_tool_image->resize($product['image'], $this->config->get('theme_' .
                        $this->config->get('config_theme') . '_image_cart_width'), $this->config->get('theme_' .
                        $this->config->get('config_theme') . '_image_cart_height'));
                } else
                {
                    $image = '';
                }

                $option_data = array();

                if ($type_product == 0)
                {
                    foreach ($product['option'] as $option)
                    {
                        if ($option['type'] != 'file')
                        {
                            $value = $option['value'];
                        } else
                        {
                            $upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

                            if ($upload_info)
                            {
                                $value = $upload_info['name'];
                            } else
                            {
                                $value = '';
                            }
                        }

                        $option_data[] = array('name' => $option['name'], 'value' => (utf8_strlen($value) > 20 ? utf8_substr($value, 0, 20) . '..' : $value));
                    }
                } else
                {
                    $product_options = $product['cart_option'];
                    $product_options = explode(',', $product_options);
                    
                    $product_options_1 = $product['option'];
                    

                    $this->document->displayCard($product_options, $product_options_1, $option_data);
                    //print_r($option_data);die();
                }
                
                $type_product = ($type_product == 0) ? true: false;

                // Display prices
                if ($this->customer->isLogged() || !$this->config->get('config_customer_price'))
                {
                    $unit_price = $this->tax->calculate($product['price'], $product['tax_class_id'],
                        $this->config->get('config_tax'));

                    $price = $this->currency->format($unit_price, $this->session->data['currency']);
                    $total = $this->currency->format($unit_price * $product['quantity'], $this->
                        session->data['currency']);
                } else
                {
                    $price = false;
                    $total = false;
                }

                $recurring = '';

                if ($product['recurring'])
                {
                    $frequencies = array(
                        'day' => $this->language->get('text_day'),
                        'week' => $this->language->get('text_week'),
                        'semi_month' => $this->language->get('text_semi_month'),
                        'month' => $this->language->get('text_month'),
                        'year' => $this->language->get('text_year'));

                    if ($product['recurring']['trial'])
                    {
                        $recurring = sprintf($this->language->get('text_trial_description'), $this->
                            currency->format($this->tax->calculate($product['recurring']['trial_price'] * $product['quantity'],
                            $product['tax_class_id'], $this->config->get('config_tax')), $this->session->
                            data['currency']), $product['recurring']['trial_cycle'], $frequencies[$product['recurring']['trial_frequency']],
                            $product['recurring']['trial_duration']) . ' ';
                    }

                    if ($product['recurring']['duration'])
                    {
                        $recurring .= sprintf($this->language->get('text_payment_description'), $this->
                            currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'],
                            $product['tax_class_id'], $this->config->get('config_tax')), $this->session->
                            data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']],
                            $product['recurring']['duration']);
                    } else
                    {
                        $recurring .= sprintf($this->language->get('text_payment_cancel'), $this->
                            currency->format($this->tax->calculate($product['recurring']['price'] * $product['quantity'],
                            $product['tax_class_id'], $this->config->get('config_tax')), $this->session->
                            data['currency']), $product['recurring']['cycle'], $frequencies[$product['recurring']['frequency']],
                            $product['recurring']['duration']);
                    }
                }

                $product['name'] = explode('#', $product['name']);

                $data['products'][] = array(
                    'cart_id' => $product['cart_id'],
                    'thumb' => $image,
                    'type_product'  => $type_product,
                    'name_1' => $product['name'][0],
                    'name_2' => $product['name'][1],
                    'stock_status'      => $product['stock_status'],
					'upc'      => $product['upc'],
                    'model' => $product['model'],
                    'option' => $option_data,
                    'recurring' => $recurring,
                    'quantity' => $product['quantity'],
                    'stock' => $product['stock'] ? true : !(!$this->config->get('config_stock_checkout') ||
                        $this->config->get('config_stock_warning')),
                    'reward' => ($product['reward'] ? sprintf($this->language->get('text_points'), $product['reward']) :
                        ''),
                    'price' => $price,
                    'total' => $total,
                    'href' => $this->url->link('product/product', 'product_id=' . $product['product_id']));
            }

            // Gift Voucher
            $data['vouchers'] = array();

            if (!empty($this->session->data['vouchers']))
            {
                foreach ($this->session->data['vouchers'] as $key => $voucher)
                {
                    $data['vouchers'][] = array(
                        'key' => $key,
                        'description' => $voucher['description'],
                        'amount' => $this->currency->format($voucher['amount'], $this->session->data['currency']),
                        'remove' => $this->url->link('checkout/cart', 'remove=' . $key));
                }
            }

            // Totals
            $this->load->model('setting/extension');

            $totals = array();
            $taxes = $this->cart->getTaxes();
            $total = 0;

            // Because __call can not keep var references so we put them into an array.
            $total_data = array(
                'totals' => &$totals,
                'taxes' => &$taxes,
                'total' => &$total);

            // Display prices
            if ($this->customer->isLogged() || !$this->config->get('config_customer_price'))
            {
                $sort_order = array();

                $results = $this->model_setting_extension->getExtensions('total');
                //print_r($results);die();

                foreach ($results as $key => $value)
                {
                    $sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
                }

                array_multisort($sort_order, SORT_ASC, $results);

                foreach ($results as $result)
                {
                    if ($this->config->get('total_' . $result['code'] . '_status'))
                    {
                        $this->load->model('extension/total/' . $result['code']);

                        // We have to put the totals in an array so that they pass by reference.
                        $this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
                    }
                }

                $sort_order = array();

                foreach ($totals as $key => $value)
                {
                    $sort_order[$key] = $value['sort_order'];
                }

                array_multisort($sort_order, SORT_ASC, $totals);
            }

            $this->document->displayOrder($totals);
            //print_r($totals);
            
            $data['show_number'] = MIN_SHIP_GERMANY - $totals[count($totals) - 1]['value'];
            $data['show_number'] = $this->currency->format($data['show_number'], $this->session->data['currency']);
            
            $data['style'] = ($data['show_number'] <= 0) ? 'style="opacity: 0"' : '';

            $data['totals'] = array();

            foreach ($totals as $total)
            {
                $data['totals'][] = array('title' => $total['title'], 'text' => $this->currency->
                        format($total['value'], $this->session->data['currency']));
            }

            $data['continue'] = $this->url->link('common/home');

            $data['checkout'] = $this->url->link('checkout/checkout', '', true);

            $this->load->model('setting/extension');

            $data['modules'] = array();

            $files = glob(DIR_APPLICATION . '/controller/extension/total/*.php');

            if ($files)
            {
                foreach ($files as $file)
                {
                    $result = $this->load->controller('extension/total/' . basename($file, '.php'));

                    if ($result)
                    {
                        $data['modules'][] = $result;
                    }
                }
            }

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('checkout/cart', $data));
        } else
        {
            $data['text_error'] = $this->language->get('text_empty');

            $data['continue'] = $this->url->link('common/home');

            unset($this->session->data['success']);

            $data['column_left'] = $this->load->controller('common/column_left');
            $data['column_right'] = $this->load->controller('common/column_right');
            $data['content_top'] = $this->load->controller('common/content_top');
            $data['content_bottom'] = $this->load->controller('common/content_bottom');
            $data['footer'] = $this->load->controller('common/footer');
            $data['header'] = $this->load->controller('common/header');

            $this->response->setOutput($this->load->view('error/not_found', $data));
        }
    }

    public function add()
    {
        //echo "ddzz"; die();
        $this->load->language('checkout/cart');

        $json = array();

        if (isset($this->request->post['product_id']))
        {
            $product_id = (int)$this->request->post['product_id'];
        } else
        {
            $product_id = 0;
        }

        $this->load->model('catalog/product');

        $product_info = $this->model_catalog_product->getProduct($product_id);

        if ($product_info)
        {
            if (isset($this->request->post['quantity']))
            {
                $quantity = (int)$this->request->post['quantity'];
            } else
            {
                $quantity = 1;
            }

            if (isset($this->request->post['option']))
            {
                $option = array_filter($this->request->post['option']);
            } else
            {
                $option = array();
            }

            $product_options = $this->model_catalog_product->getProductOptions($this->
                request->post['product_id']);
            //print_r($product_options); die();

            foreach ($product_options as $product_option)
            {
                if ($product_option['required'] && empty($option[$product_option['product_option_id']]))
                {
                    $json['error']['option'][$product_option['product_option_id']] = sprintf($this->
                        language->get('error_required'), $product_option['name']);
                }
            }

            if (isset($this->request->post['recurring_id']))
            {
                $recurring_id = $this->request->post['recurring_id'];
            } else
            {
                $recurring_id = 0;
            }

            $recurrings = $this->model_catalog_product->getProfiles($product_info['product_id']);

            if ($recurrings)
            {
                $recurring_ids = array();

                foreach ($recurrings as $recurring)
                {
                    $recurring_ids[] = $recurring['recurring_id'];
                }

                if (!in_array($recurring_id, $recurring_ids))
                {
                    $json['error']['recurring'] = $this->language->get('error_recurring_required');
                }
            }

            if (!$json)
            {
                if ($this->request->post['product_mix_mask'] != '')
                    $option_mixmask = $this->request->post['product_mix_mask'];
                
                //echo $this->request->post['product_mix_mask']; die();
                $option[''] = $option_mixmask;
                //print_r($option); die();
                $this->cart->add($this->request->post['product_id'], $quantity, $option, $recurring_id);
                //echo $this->cart->getSessionId();
                //print_r($_SESSION);return;

                $json['success'] = sprintf($this->language->get('text_success'), $this->url->
                    link('product/product', 'product_id=' . $this->request->post['product_id']), str_replace(array('#'), ' ', $product_info['name']),
                    $this->url->link('checkout/cart'));

                // Unset all shipping and payment methods
                unset($this->session->data['shipping_method']);
                unset($this->session->data['shipping_methods']);
                unset($this->session->data['payment_method']);
                unset($this->session->data['payment_methods']);

                // Totals
                $this->load->model('setting/extension');

                $totals = array();
                $taxes = $this->cart->getTaxes();
                $total = 0;

                // Because __call can not keep var references so we put them into an array.
                $total_data = array(
                    'totals' => &$totals,
                    'taxes' => &$taxes,
                    'total' => &$total);

                // Display prices
                if ($this->customer->isLogged() || !$this->config->get('config_customer_price'))
                {
                    $sort_order = array();

                    $results = $this->model_setting_extension->getExtensions('total');

                    foreach ($results as $key => $value)
                    {
                        $sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
                    }

                    array_multisort($sort_order, SORT_ASC, $results);

                    foreach ($results as $result)
                    {
                        if ($this->config->get('total_' . $result['code'] . '_status'))
                        {
                            $this->load->model('extension/total/' . $result['code']);

                            // We have to put the totals in an array so that they pass by reference.
                            $this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
                        }
                    }

                    $sort_order = array();

                    foreach ($totals as $key => $value)
                    {
                        $sort_order[$key] = $value['sort_order'];
                    }

                    array_multisort($sort_order, SORT_ASC, $totals);
                }
                $json['total_price'] = $this->currency->format($total, $this->session->data['currency']);
                $json['total'] = sprintf($this->language->get('text_items'), $this->cart->
                    countProducts() + (isset($this->session->data['vouchers']) ? count($this->
                    session->data['vouchers']) : 0), $this->currency->format($total, $this->session->
                    data['currency']));
            } else
            {
                $json['redirect'] = str_replace('&amp;', '&', $this->url->link('product/product',
                    'product_id=' . $this->request->post['product_id']));
            }
        }

        //$_SESSION['cart_'] = $this->load->controller('common/cart');
        if($_COOKIE['cart'] == '' || $_COOKIE['cart'] == null) {
            //echo "no set";
            setcookie("cart", $this->load->controller('common/cart'), time()+3600, "/");
            //setcookie("cart", $this->load->controller('common/cart'), time()+3600, "/");
            
        } else {
            //echo "set";
            setcookie("cart", $this->load->controller('common/cart'), time()+3600, "/");
            //$_COOKIE["cart"] = $this->load->controller('common/cart');
        }
        //print_r($_COOKIE) ; die();

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function edit()
    {
        $this->load->language('checkout/cart');

        $json = array();

        // Update
        if (!empty($this->request->post['quantity']))
        {
            foreach ($this->request->post['quantity'] as $key => $value)
            {
                $this->cart->update($key, $value);
            }

            $this->session->data['success'] = $this->language->get('text_remove');

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['reward']);

            $this->response->redirect($this->url->link('checkout/cart'));
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function remove()
    {
        $this->load->language('checkout/cart');

        $json = array();

        // Remove
        if (isset($this->request->post['key']))
        {
            $this->cart->remove($this->request->post['key']);

            unset($this->session->data['vouchers'][$this->request->post['key']]);

            $json['success'] = $this->language->get('text_remove');

            unset($this->session->data['shipping_method']);
            unset($this->session->data['shipping_methods']);
            unset($this->session->data['payment_method']);
            unset($this->session->data['payment_methods']);
            unset($this->session->data['reward']);

            // Totals
            $this->load->model('setting/extension');

            $totals = array();
            $taxes = $this->cart->getTaxes();
            $total = 0;

            // Because __call can not keep var references so we put them into an array.
            $total_data = array(
                'totals' => &$totals,
                'taxes' => &$taxes,
                'total' => &$total);

            // Display prices
            if ($this->customer->isLogged() || !$this->config->get('config_customer_price'))
            {
                $sort_order = array();

                $results = $this->model_setting_extension->getExtensions('total');

                foreach ($results as $key => $value)
                {
                    $sort_order[$key] = $this->config->get('total_' . $value['code'] . '_sort_order');
                }

                array_multisort($sort_order, SORT_ASC, $results);

                foreach ($results as $result)
                {
                    if ($this->config->get('total_' . $result['code'] . '_status'))
                    {
                        $this->load->model('extension/total/' . $result['code']);

                        // We have to put the totals in an array so that they pass by reference.
                        $this->{'model_extension_total_' . $result['code']}->getTotal($total_data);
                    }
                }

                $sort_order = array();

                foreach ($totals as $key => $value)
                {
                    $sort_order[$key] = $value['sort_order'];
                }

                array_multisort($sort_order, SORT_ASC, $totals);
            }

            $json['total_price'] = $this->currency->format($total, $this->session->data['currency']);
            $json['total'] = sprintf($this->language->get('text_items'), $this->cart->
                countProducts() + (isset($this->session->data['vouchers']) ? count($this->
                session->data['vouchers']) : 0), $this->currency->format($total, $this->session->
                data['currency']));
        }

        setcookie("cart", $this->load->controller('common/cart'), time()+3600, "/"); 

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
