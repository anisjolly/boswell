<?php
  class OpenLDBWS
  {
    private $soapClient = NULL;

    function __construct($token)
    {
      $this->soapClient = new SoapClient("https://lite.realtime.nationalrail.co.uk/OpenLDBWS/wsdl.aspx",array('trace' => TRUE,'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP ));

      $soapVar = new SoapVar(array('ns2:TokenValue' => $token),SOAP_ENC_OBJECT);

      $soapHeader = new SoapHeader('http://thalesgroup.com/RTTI/2010-11-01/ldb/commontypes','AccessToken',$soapVar,FALSE);

      $this->soapClient->__setSoapHeaders($soapHeader);
    }

    function StationBoard($method,$numRows,$crs,$filterCrs="",$filterType="",$timeOffset="",$timeWindow="")
    {
      $params["numRows"] = $numRows;

      $params["crs"] = $crs;

      if ($filterCrs) $params["filterCrs"] = $filterCrs;

      if ($filterType) $params["filterType"] = $filterType;

      if ($timeOffset) $params["timeOffset"] = $timeOffset;

      if ($timeWindow) $params["timeWindow"] = $timeWindow;

      return $this->soapClient->$method($params);
    }

    function GetServiceDetails($serviceID)
    {
      $params["serviceID"] = $serviceID;

      return $this->soapClient->GetServiceDetails($params);
    }

    function GetDepartureBoard($numRows,$crs,$filterCrs="",$filterType="",$timeOffset="",$timeWindow="")
    {
      return $this->StationBoard("GetDepartureBoard",$numRows,$crs,$filterCrs,$filterType,$timeOffset,$timeWindow);
    }

    function GetArrivalBoard($numRows,$crs,$filterCrs="",$filterType="",$timeOffset="",$timeWindow="")
    {
      return $this->StationBoard("GetArrivalBoard",$numRows,$crs,$filterCrs,$filterType,$timeOffset,$timeWindow);
    }

    function GetArrivalDepartureBoard($numRows,$crs,$filterCrs="",$filterType="",$timeOffset="",$timeWindow="")
    {
      return $this->StationBoard("GetArrivalDepartureBoard",$numRows,$crs,$filterCrs,$filterType,$timeOffset,$timeWindow);
    }
  }
?>
