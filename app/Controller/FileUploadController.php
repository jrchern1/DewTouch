<?php

class FileUploadController extends AppController {
	public function index() {

        if ($this->request->is('post')) {
			$uploaddata = '';
            if(!empty($this->request->data['FileUpload']['file']['name'])){
				$pdata=$this->request->data['FileUpload']['file'];
				if ($pdata["error"] == 0){				
                	$fileName = $pdata['name'];
					if ($pdata['type']=='text/csv') {
                		$uploadPath = 'uploads/';
                		$uploadFile = $uploadPath.$fileName;
                		if(@move_uploaded_file($pdata['tmp_name'],$uploadFile)){
							$rec=0;
							$rdata='';
							$f_all=file_get_contents($uploadFile);
							$excel = explode("\r", $f_all);

	                        for ($i=1; $i<count($excel); $i++) {
								$line=$excel[$i];
								$rdata.='/'.$line;
								$txtdata=explode(",", $line);
								$fdata = array(
									'FileUpload' => array(
										'name' => $txtdata[0],
										'email' => $txtdata[1],
										'valid' => 1,
										'created' => date("Y-m-d H:i:s"),
										'modified' => date("Y-m-d H:i:s")
									)
								);
								$this->FileUpload->create();

									// save the data
								$this->FileUpload->save($fdata);
                                $rec++;
							}
							$s1='File has been uploaded and '.$rec.' records inserted successfully.';
							$this->setFlash(__($s1));
                		}else{
                    		$this->setFlash(__('Unable to upload file, please try again.'));
						}
					}
					else {
						$this->setFlash(__('Not a text/csv file'));
					}
                }
				else {
					$this->setFlash(__('Upload Error.'));
				}
            }else{
                $this->setFlash(__('Please choose a file to upload.'));
            }
		}
		$this->set('title', __('File Upload Answer'));

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));

	}
}