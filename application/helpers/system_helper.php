<?php 

function periode_aktif()
{
  $ci = get_instance();
  $ci->load->model('periode_model');

  return $ci->periode_model->periode_aktif();
}