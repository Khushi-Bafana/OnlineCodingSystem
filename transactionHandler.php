<?php 

    //include_once "deconnect.php";

    class TransactionHandler {

        public $returnValue = NULL;

        public function _construct() {
            //include "deconnect.php";
        }

        public function register_user($name, $email, $type, $password) {
            include "deconnect.php";

            $returnValue = FALSE;
            $sql = "insert into users(name, email, type, password) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $type, $password);
            $returnValue = ($stmt->execute());

            return $returnValue;
        }

        public function login_user($email, $password) {
            include "deconnect.php";

            $sql = "select email, password from users where email = '" . $email . "' and password = '" . sha1($password) . "';";
            $result = $conn->query($sql);
            $returnValue = ($result->num_rows > 0);

            return $returnValue;
        }

        public function register_class($name, $passcode, $teacher, $members, $description) {
            include "deconnect.php";

            $returnValue = FALSE;
            $sql = "insert into classes(name, passcode, teacher, Members, description) values(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $passcode, $teacher, $members, $description);
            $returnValue = ($stmt->execute());

            return $returnValue;
        }

        public function getClasses($teacher) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, description from classes where teacher = '" . $teacher . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()) {
                    array_push($returnValue, array($rows["name"], $rows["description"]));
                }
            }

            return $returnValue;
        }

        public function getUserFromEM($email) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, type from users where email = '" . $email . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, $row["name"], $row["type"]);
                }
            }

            return $returnValue;
        }

        public function add_questions($name, $qText, $answer, $teacher, $class) {
            include "deconnect.php";

            $returnValue = FALSE;
            $sql = "insert into pQuestions(name, qText, answer, teacher, class) values(?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $qText, $answer, $teacher, $class);
            $returnValue = ($stmt->execute());

            return $returnValue;
        }

        public function getPrParams($name) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select qText, answer from pQuestions where name = '" . $name . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, $row["qText"]);
                    array_push($returnValue, $row["answer"]);
                }
            }

            return $returnValue;
        }

        public function getDoneOnesNew($name, $class) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, qText from pQSubmission where student = '" . $name . "' and class = '" . $class . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($row["name"], $row["qText"]));
                }
            }

            return $returnValue;
        }

        public function getUndoneOnesNew($class, $checkArray) {
            include "deconnect.php";

            $returnValue = array();
            $returnValue = self::your_array_diff(self::getAllQNew($class), $checkArray);

            return $returnValue;
        }
        
        public function your_array_diff($arraya, $arrayb) {

            foreach ($arraya as $keya => $valuea) {
                if (in_array($valuea, $arrayb)) {
                    unset($arraya[$keya]);
                }
            }
            return $arraya;
        }

        public function getAllQNew($class) {
            include "deconnect.php";
    
            $returnValue = array();
            $sql = "select name, qText from pQuestions where class = '" . $class . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($row["name"], $row["qText"]));
                }
            }

            return $returnValue;
        }

        public function getDoneOnes($name) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, qText from pQSubmission where student = '" . $name . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($row["name"], $row["qText"]));
                }
            }

            return $returnValue;
        }

        public function getUndoneOnes($checkArray) {
            error_reporting(0);
            include "deconnect.php";

            $returnValue = array();

            $allVal = self::getAllQ();

            for ($_dataB = 1; $_dataB < count($allVal) + 1; $_dataB++) {
                for ($iteration = 1; $iteration < count($checkArray); $iteration++) {
                    if ($allVal[$_dataB] === $checkArray[$iteration]) {
                        unset($allVal[$_dataB]);
                    }
                }
            }

            $returnValue = array_values($allVal);

            return $returnValue;
        }

        public function getAllQ() {
            include "deconnect.php";
    
            $returnValue = array();
            $sql = "select name, qText from pQuestions;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($row["name"], $row["qText"]));
                }
            }

            return $returnValue;
        }

        public function getAllSubmission($class) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, status, student from pQSubmission where class = '" . $class . "';";
            $result = $conn->query($sql);

            $iteration = 1;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($iteration, $row["name"], $row["status"], $row["student"]));
                    $iteration += 1;
                }
            }
        
            return $returnValue;
        }

        public function subMitProgram($name, $pText, $qText, $status, $student, $class) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "insert into pQSubmission(name, pText, qText, status, student, class) values(?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $name, $pText, $qText, $status, $student, $class);
            $returnValue = ($stmt->execute());

            return $returnValue;
        }

        public function getUserDetails($name) {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select name, email, type from users where name = '" . $name . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, $row["name"]);
                    array_push($returnValue, $row["email"]);
                    array_push($returnValue, $row["type"]);
                }
            }

            return $returnValue;
        }

        public function getRemainderClasses($name) {
            $returnValue = array();

            $classesData = self::getAllClasses();

            foreach($classesData as $singleList) {
                if (!self::checkIfEnrolledInClass($singleList[1], $name)) {
                    array_push($returnValue, $singleList[0]);
                }
            }

            return $returnValue;
        }

        public function getStudentsClasses($name) {
            $returnValue = array();

            $classesData = self::getAllClasses();

            foreach($classesData as $singleList) {
                if (self::checkIfEnrolledInClass($singleList[1], $name)) {
                    array_push($returnValue, $singleList[0]);
                }
            }

            return $returnValue;
        }

        public function getAllClasses() {
            include "deconnect.php";

            $returnValue = array();
            $sql = "select * from classes;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($returnValue, array($row["name"], $row["Members"]));
                }
            }

            return $returnValue;
        }

        public function checkIfEnrolledInClass($members, $student) {
            $membersArr = explode(",", $members);
            
            $returnValue = FALSE;

            foreach ($membersArr as $member) {
                if ($member === $student) {
                    $returnValue = TRUE;
                    break;
                }
            }

            return $returnValue;
        }

        public function changePassword($name, $oldPassword, $newPassword) {
            include "deconnect.php";

            $returnValue = "IDKWHAT";
            $sql = "select * from users where name = '" . $name . "' and password = '" . sha1($oldPassword) . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $sql = "update users set password = ? where name = ?;";
                $stmt = $conn->prepare($sql);
                $password_set = sha1($newPassword);
                $stmt->bind_param("ss", $password_set, $name);
                $returnValue = ($stmt->execute()) ? "DONE" : "FAILED";
            } else {
                $returnValue = "NOTFOUND";
            }

            return $returnValue;
        }

        public function addStudentToCourse($name, $class, $password) {
            include "deconnect.php";

            $memberData = NULL;

            $sql = "select Members from classes where name = '" . $class . "';";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $memberData = $row["Members"];
                }
            }

            $passcodeH = sha1($password);

            $sql = "select * from classes where name = '" . $class . "' and passcode = '" . $passcodeH . "';";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                return "WP";
            }

            $data = NULL;

            if ($memberData === "empty") {
                $data = $name;
            } else {
                $data = $memberData . "," . $name;
            }

            $sql = "update classes set Members = ? where name = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $data, $class);
            return ($stmt->execute());
        }

        public function forgotPassword($email) { }
    }

?>
