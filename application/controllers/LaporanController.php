<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class LaporanController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Mpengajuan']);

	}
	public function index()
	{
		$this->load_view('Vlaporan');
	}

	public function submit()
	{
		$param = (object) $this->input->post();


		$where = [];

		if (isset($param->tanggal_dari) && $param->tanggal_dari != null) {
			$where['tanggal >='] = $param->tanggal_dari;
		}

		if (isset($param->tanggal_sampai) && $param->tanggal_sampai != null) {
			$where['tanggal <='] = $param->tanggal_sampai;
		}

		if (isset($param->status) && $param->status != null) {
			$where['status_pengajuan'] = $param->status;
		}

		$report = $this->Mpengajuan->get_report($where);

		ob_start();
        $this->load->view('Vlaporan_print', ['reports' => $report]);
        $content = ob_get_clean();
        
        $dompdf = new Dompdf();
		$dompdf->loadHtml($content);
		$dompdf->setPaper('A4', 'potrait');

		$dompdf->render();

		$dompdf->stream("laporan.pdf", array("Attachment" => false));

		exit(0);

		var_dump ($report);
		die();
	}

}

/* End of file LaporanController.php */
/* Location: ./application/controllers/LaporanController.php */