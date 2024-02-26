<?php

class addednames {
private $namesList = [];

public function addClearNames() {
    if (isset($_POST['add'])) {
        $name = $_POST['name'] ?? '';
        $this->addName($name);
        } elseif (isset($_POST['clear'])) {
            $this->clearNames();
        }

        return $this->formatNamesForOutput();
    }
private function addName($name) {
    $parts = explode(' ', trim($name));
    if (count($parts) >= 2) {
        $lastName = array_pop($parts);
            $firstName = implode(' ', $parts);
                $formattedName = $lastName . ', ' . $firstName;
                    $this->namesList[] = $formattedName;
                        $this->sortNames();
        }
    }

private function clearNames() {
     $this->namesList = [];
    }

private function sortNames() {
    sort($this->namesList);
    }

private function formatNamesForOutput() {
    return implode("\n", $this->namesList);
    }
}

?>

