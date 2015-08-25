<?php
/**
 * Config file for writing form validation rules.
 * Nothing else will be written here.
 * All rules have to b written as an array.
 *
 *
 * Worked here on April 13, 2015
 */
$config = array(
    'user/registration' => array(
        array(
            'field' => 'first-name',
            'label' => 'First Name',
            'rules' => 'trim|required|alpha_dash|xss_clean',
        ),
        array(
            'field' => 'last-name',
            'label' => 'Last Name',
            'rules' => 'trim|required|alpha_dash|xss_clean',
        ),
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'trim|required|valid_email',
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required',
        ),
    ),
    'user/login' => array(
        array(
            'field' => 'signin-mail',
            'label' => 'Email Address',
            'rules' => 'trim|required|valid_email',
        ),
        array(
            'field' => 'signin-pass',
            'label' => 'Password',
            'rules' => 'trim|required',
        ),
    ),
    'category/add' => array(
        array(
            'field' => 'category-name',
            'label' => 'Category Name',
            'rules' => 'required | alpha_numeric',
        ),
    ),
    'product/add' => array(
        array(
            'field' => 'product-name',
            'label' => 'Product Name',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'product-category',
            'label' => 'Product Category',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'product-description',
            'label' => 'Product Description',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'product-stock',
            'label' => 'Product Stock',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'product-price',
            'label' => 'Product Price',
            'rules' => 'trim|required',
        ),
    ),
);