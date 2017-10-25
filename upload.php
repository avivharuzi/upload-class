<?php

class Upload {
    private $FinallyName;
    private $ErrorMsg;

    public function fileUpload($file, $destinationFolder, $chosenName = false, $limitSize = 1000000, $allowed = array("jpg", "jpeg", "png", "gif")) {
        $fileName    = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileSize    = $file["size"];
        $fileError   = $file["error"];
        $fileType    = $file["type"];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < $limitSize) {
                    if ($chosenName === false) {
                        $fileNameNew = uniqid("", true) . "." . $fileActualExt;
                        $fileDestination = $destinationFolder . $fileNameNew;
                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $this->FinallyName = $fileNameNew;
                            return true;
                        } else {
                            $this->ErrorMsg = "Failed to upload image";
                        }
                    } else {
                        $fileNameNew = $chosenName . "." . $fileActualExt;
                        $fileDestination = $destinationFolder . $fileNameNew;
                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $this->FinallyName = $fileNameNew;
                            return true;
                        } else {
                            $this->ErrorMsg = "Failed to upload image";
                        }
                    }
                } else {
                    $this->ErrorMsg = "Your file is too big";
                }
            } else {
                $this->ErrorMsg = "There was an error uploading your file";
            }
        } else {
            $this->ErrorMsg = "You cannot upload files of this type";
        }
    }

    public function getFinallyName() {
        return $this->FinallyName;
    }

    public function getErrorMsg() {
        return $this->ErrorMsg;
    }
}

?>