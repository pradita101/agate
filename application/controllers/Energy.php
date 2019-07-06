<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Energy extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('energy_page');
    }

    public function regen_energy()
    {
        $last_energy = $this->input->post('last_energy');
        $last_timestamp = $this->input->post('last_timestamp');
        $energy_time = $this->input->post('energy_time');
        $now = time();
        $add_energy = floor(($now - $last_timestamp) / $energy_time);
        $new_energy = $add_energy + $last_energy;

        echo $new_energy;
        exit();
    }
}