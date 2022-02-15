<?php

class C_landing extends CI_Controller
{
    public function booking()
    {
        $this->load->view('landing/v_booking');
    }

    public function home()
    {
        $this->load->view('landing/v_landing');
    }

    public function pelanggan()
    {
        $this->load->view('v_templates_pelanggan');
    }
}
