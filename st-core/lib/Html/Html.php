<?php
namespace lib\Html;
class Html{
	public static function createNav($link,$content){
		$dom = new \DOMDocument('1.0','utf-8');
		$li  = $dom->createElement("li");
		$attr = $dom->createAttribute("class");
		$attr->value = "nav-item";
		$li->appendChild($attr);

		$ancher  = $dom->createElement("a",$content);
		$attr = $dom->createAttribute("class");
		$attr->value = "nav-link";
		$ancher->appendChild($attr);
		$attr = $dom->createAttribute("href");
		$attr->value = $link;
		$ancher->appendChild($attr);

		$li->appendChild($ancher);

		$dom->appendChild($li);
		return($dom->saveHTML());
	}
}
