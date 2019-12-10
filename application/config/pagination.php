<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $config['reuse_query_string'] = TRUE;

$config['pagination_config'] = array(
	'reuse_query_string' => TRUE,

	'uri_segment' => 3,
	'per_page' => 10,
	'num_links' => 5,
	'use_page_numbers' => TRUE,
	// 'page_query_string' => TRUE,

    'full_tag_open' => '<ul class="pagination">',
    'full_tag_close' => '</ul>',
    'num_tag_open' => '<li class="page-item">',
    'num_tag_close' => '</li>',
    'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
    'cur_tag_close' => '</span></li>',
    'prev_tag_open' => '<li class="page-item">',
    'prev_tag_close' => '</li>',
    'next_tag_open' => '<li class="page-item">',
    'next_tag_close' => '</li>',
    'prev_link' => '&lt;',
    'next_link' => '&gt;',
    'last_tag_open' => '<li class="page-item">',
    'last_link' => '&raquo;',
    'last_tag_close' => '</li>',
    'first_tag_open' => '<li class="page-item">',
    'first_link' => '&laquo;',
    'first_tag_close' => '</li>',
    // 'suffix' => '.html'
);
