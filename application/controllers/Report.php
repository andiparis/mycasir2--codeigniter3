<?php 
class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['m_report', 'm_sale']);
	}

	public function index() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dari_tanggal', 'Tanggal Awal', 'required');
		$this->form_validation->set_rules('sampai_tanggal', 'Tanggal Akhir', 'required');

		if($this->form_validation->run() == FALSE) {
			$data['report'] = $this->m_report->get();
			$this->template->load('template', 'report/report_data', $data);
		} else{
			$post = $this->input->post(null, TRUE);
			$SD = $post['dari_tanggal'];
			$ED = $post['sampai_tanggal'];
			$SDF = date("d-m-Y", strtotime($SD));
			$EDF = date("d-m-Y", strtotime($ED));
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			$excel = new PHPExcel();
			$excel->getProperties()->setCreator('Tinky Winky Baby Shop')
			->setLastModifiedBy('Tinky Winky Baby Shop')
			->setTitle("Report Data")
			->setSubject("Report Data")
			->setDescription("Report Data")
			->setKeywords("Report Data");

			$style_col = array(
				'font' => array('bold' => true),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
				)
			);

			$style_row = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				),
				'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
				)
			);
			$excel->setActiveSheetIndex(0)->setCellValue('A1', "Report Data");
			$excel->getActiveSheet()->mergeCells('A1:F1');
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
			$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
			$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->setActiveSheetIndex(0)->setCellValue('A2', "Data Dari Tanggal ".$SDF." Sampai Tanggal ".$EDF);
			$excel->getActiveSheet()->mergeCells('A2:F2');
			$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(12);
			$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
			$excel->setActiveSheetIndex(0)->setCellValue('B3', "INVOICE");
			$excel->setActiveSheetIndex(0)->setCellValue('C3', "DATE");
			$excel->setActiveSheetIndex(0)->setCellValue('D3', "SUB TOTAL");
			$excel->setActiveSheetIndex(0)->setCellValue('E3', "DISCOUNT");
			$excel->setActiveSheetIndex(0)->setCellValue('F3', "GRAND TOTAL");
			$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
			$data = $this->m_report->filter($post);
			$no = 1;
			$numrow = 4;

			foreach($data->result() as $data) {
				$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->invoice);
				$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, date("d-m-Y", strtotime($data->date)));
				$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->total_price);
				$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->discount);
				$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->final_price);
				$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				$no++;
				$numrow++;
			}
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
			$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$excel->getActiveSheet(0)->setTitle("Report Data");
			$excel->setActiveSheetIndex(0);
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Report Data"'.$SDF.'" sampai "'.$EDF.'".xlsx"');
			header('Cache-Control: max-age=0');
			$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
			ob_end_clean();
			$write->save('php://output');
		}
	}
}