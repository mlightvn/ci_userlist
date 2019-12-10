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
    'num_tag_open' => '<li class="page-item"><span class="page-link">',
    'num_tag_close' => '</span></li>',
    'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
    'cur_tag_close' => '</span></li>',
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
