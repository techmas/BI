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
?>
