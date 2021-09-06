<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller{

  private $folder = "backend/laporan/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    belum_login();
    $this->load->model(array('M_user','M_absensi','M_pengaturan'));
  }

  function index()
  {
    $data = array(
      'page' => 'Absensi',
      'subpage' => 'Laporan',
      'row'  => $this->M_absensi->getall(),
      'user' => $this->M_user->get(),
      'pengaturan' => $this->M_pengaturan->get(1)->row(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['filter'])) {
      $data = array(
        'page' => 'Absensi',
        'subpage' => 'Laporan',
        'row'  => $this->M_absensi->getall(),
        'user' => $this->M_user->get(),
        'pengaturan' => $this->M_pengaturan->get(1)->row(),
      );
      $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
    } else if (isset($_POST['export'])) {
      $data = $this->M_absensi->getall();
      $pengaturan = $this->M_pengaturan->get(1)->row();
      $spreadsheet = new Spreadsheet;
      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'Nama Lengkap')
      ->setCellValue('C1', 'Tanggal')
      ->setCellValue('D1', 'Absen Masuk')
      ->setCellValue('E1', 'Absen Pulang')
      ->setCellValue('F1', 'Keterangan')
      ->setCellValue('G1', 'Status');
      $kolom = 2;
      $nomor = 1;
      foreach($data->result() as $row) {
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $row->nama_lengkap)
        ->setCellValue('C' . $kolom, longdate_indo($row->tgl_absen))
        ->setCellValue('D' . $kolom, $row->absen_masuk)
        ->setCellValue('E' . $kolom, $row->absen_pulang)
        ->setCellValue('F' . $kolom, $row->keterangan_absen);
        if ($row->absen_masuk >= $pengaturan->bts_absen_masuk) {
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('G' . $kolom, "Absen Masuk Terlambat");
        } else {
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('G' . $kolom, "Sudah Absen");
        }
        $kolom++;
        $nomor++;
      }
      // Autowidth
      foreach(range('A','G') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
      }
      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Laporan Absensi.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');
    } else if (isset($_POST['export_user'])) {
      $data = $this->M_absensi->get_user();
      $pengaturan = $this->M_pengaturan->get(1)->row();
      $spreadsheet = new Spreadsheet;
      $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'No')
      ->setCellValue('B1', 'Nama Lengkap')
      ->setCellValue('C1', 'Tanggal')
      ->setCellValue('D1', 'Absen Masuk')
      ->setCellValue('E1', 'Absen Pulang')
      ->setCellValue('F1', 'Keterangan')
      ->setCellValue('G1', 'Status');
      $kolom = 2;
      $nomor = 1;
      foreach($data->result() as $row) {
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $row->nama_lengkap)
        ->setCellValue('C' . $kolom, longdate_indo($row->tgl_absen))
        ->setCellValue('D' . $kolom, $row->absen_masuk)
        ->setCellValue('E' . $kolom, $row->absen_pulang)
        ->setCellValue('F' . $kolom, $row->keterangan_absen);
        if ($row->absen_masuk >= $pengaturan->bts_absen_masuk) {
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('G' . $kolom, "Absen Masuk Terlambat");
        } else {
          $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('G' . $kolom, "Sudah Absen");
        }
        $kolom++;
        $nomor++;
      }
      // Autowidth
      foreach(range('A','G') as $columnID) {
        $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
      }
      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Laporan Absensi.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');
    } else if (isset($_POST['cetak'])) {
      $this->load->library('pdf');
      $data = array(
        'page' => 'Absensi',
        'subpage' => 'Laporan',
        'row'  => $this->M_absensi->getall(),
        'user' => $this->M_user->get(),
        'pengaturan' => $this->M_pengaturan->get(1)->row(),
      );
      $this->load->view($this->folder.'lap_absensi', $data);
      $html = $this->output->get_output();
      $this->pdf->setPaper('A4', 'potrait');
      // $this->pdf->filename = "Laporan Surat Masuk.pdf";
      $this->pdf->load_html($html);
      $this->pdf->render();
      $this->pdf->stream("Laporan Absensi.pdf", array('Attachment' => 0));
    } else if(isset($_POST['reset'])){
      redirect('laporan','refresh');
    }
  }

}
