<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['reuse_query_string'] = TRUE;
// $config['full_tag_open'] = '<ul class="pagination">';
// $config['full_tag_close'] = '</ul>';
// $config['first_tag_open'] = '<li class="page-item">';
// $config['first_tag_close'] = '</li>';
// $config['last_tag_open'] = '<li class="page-item">';
// $config['last_tag_close'] = '</li>';
// $config['next_tag_open'] = '<li class="page-item">';
// $config['next_tag_close'] = '</li>';
// $config['prev_tag_open'] = '<li class="page-item">';
// $config['prev_tag_close'] = '</li>';
// $config['cur_tag_open'] = '<li class="page-item active">';
// $config['cur_tag_close'] = '</li>';
// $config['num_tag_open'] = '<li class="page-item">';
// $config['num_tag_close'] = '</li>';


$config['pagination_config'] = array(
    'per_page' => '1',
    'full_tag_open' => '<ul class="pagination">',
    'full_tag_close' => '</ul>',
    'num_tag_open' => '<li class="page-item"><span class="page-link">',
    'num_tag_close' => '</span></li>',
    'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
    'cur_tag_close' => '</a></li>',
    'prev_tag_open' => '<li class="page-item"><span class="page-link">',
    'prev_tag_close' => '</span></li>',
    'next_tag_open' => '<li class="page-item"><span class="page-link">',
    'next_tag_close' => '</span></li>',
    'prev_link' => '&laquo;',
    'next_link' => '&raquo;',
    'last_tag_open' => '<li class="page-item"><span class="page-link">',
    'last_link' => '&gt;&gt;',
    'last_tag_close' => '</span></li>',
    'first_tag_open' => '<li class="page-item"><span class="page-link">',
    'first_link' => '&lt;&lt;',
    'first_tag_close' => '</span></li>',
    // 'suffix' => '.html'
);
