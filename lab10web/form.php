<?php

class Form
{
    private $fields = [];
    private $action;
    private $submit = "Submit Form";
    private $fieldCount = 0;

    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';

        foreach ($this->fields as $field) {
            echo "<tr><td align='right'>" . $field['label'] . "</td>";
            echo "<td><input type='text' name='" . $field['name'] . "'></td></tr>";
        }

        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table></form>";
    }

    public function addField($name, $label)
    {
        $this->fields[$this->fieldCount]['name'] = $name;
        $this->fields[$this->fieldCount]['label'] = $label;
        $this->fieldCount++;
    }
}
?>
