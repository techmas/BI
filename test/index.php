<?php

/**
 * Class JsonXMLElement
 */
class JsonXMLElement extends SimpleXMLElement implements JsonSerializable
{
 
    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by json_encode.
     */
    public function jsonSerialize()
    {
    $array = array();
 
    // json encode attributes if any.
    if ($attributes = $this->attributes()) {
        $array['@attributes'] = iterator_to_array($attributes);
    }
 
    // json encode child elements if any. group on duplicate names as an array.
    foreach ($this as $name => $element) {
        if (isset($array[$name])) {
            if (!is_array($array[$name])) {
                $array[$name] = [$array[$name]];
            }
            $array[$name][] = $element;
        } else {
            $array[$name] = $element;
        }
    }
 
    // json encode non-whitespace element simplexml text values.
    $text = trim($this);
    if (strlen($text)) {
        if ($array) {
            $array['@text'] = $text;
        } else {
            $array = $text;
        }
    }
 
    // return empty elements as NULL (self-closing or empty tags)
    if (!$array) {
        $array = NULL;
    }
 
    return $array;
  }
}

  //error_reporting(E_ALL);
  //ini_set("display_errors",1);

  // test


  //read the post input (use this technique if you have no post variable name):
    $xml_string = file_get_contents("1c_xml.txt");

    $xml = simplexml_load_string($xml_string, 'JsonXMLElement');
    $json = json_encode($xml, JSON_PRETTY_PRINT);
    $array = json_decode($json,TRUE);

    //echo $xml;
    //echo $json;

    $test = $array->{'xml'};
    print_r($test);

    function process_group($group) {
        //print "<br>group";
        foreach ($group as $key=>$value)
            print "<br> item ".$key."=>".$value;
    }

    function process_date($date) {
        print "<br><br> date ";
        print $date["day"]."<br>";
        $group = $date["group"];
        if (is_array($group[0]))
            foreach ($group as $key=>$value) {
                if (is_numeric($key)) process_group($value);
            }
        else process_group($group);
    }

    foreach ($array as $content) {
        print "<br>content " . $content;
        foreach ($content as $date) {
            process_date($date);
        }
    }

    //echo $json;
    /*
    //decode json post input as php array:
    $data = CJSON::decode($json, true);

    //contact is a Yii model:
    $contact = new Contact();

    //load json data into model:
    $contact->attributes = $data;
    //this is for responding to the client:
    $response = array();

    //save model, if that fails, get its validation errors:
    if ($contact->save() === false) {
    $response['success'] = false;
    $response['errors'] = $contact->errors;
    } else {
    $response['success'] = true;

    //respond with the saved contact in case the model/db changed any values
    $response['contacts'] = $contact;
    }

    //respond with json content type:
    header('Content-type:application/json');

    //encode the response as json:
    echo CJSON::encode($response);

    //use exit() if in debug mode and don't want to return debug output
    exit();*/


?>