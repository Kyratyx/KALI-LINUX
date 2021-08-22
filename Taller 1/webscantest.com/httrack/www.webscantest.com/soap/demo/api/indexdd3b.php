<?xml version="1.0" encoding="ISO-8859-1"?>
<definitions xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" xmlns:tns="urn:server" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns="http://schemas.xmlsoap.org/wsdl/" targetNamespace="urn:server">
<types>
<xsd:schema targetNamespace="urn:server"
>
 <xsd:import namespace="http://schemas.xmlsoap.org/soap/encoding/" />
 <xsd:import namespace="http://schemas.xmlsoap.org/wsdl/" />
 <xsd:complexType name="Product">
  <xsd:all>
   <xsd:element name="id" type="xsd:int"/>
   <xsd:element name="name" type="xsd:string"/>
   <xsd:element name="description" type="xsd:string"/>
   <xsd:element name="price" type="xsd:string"/>
   <xsd:element name="photo" type="xsd:string"/>
   <xsd:element name="error" type="xsd:string"/>
  </xsd:all>
 </xsd:complexType>
 <xsd:complexType name="ProductList">
  <xsd:complexContent>
   <xsd:restriction base="SOAP-ENC:Array">
    <xsd:attribute ref="SOAP-ENC:arrayType" wsdl:arrayType="tns:Product[]"/>
   </xsd:restriction>
  </xsd:complexContent>
 </xsd:complexType>
</xsd:schema>
</types>
<message name="createProductRequest">
  <part name="name" type="xsd:string" />
  <part name="description" type="xsd:string" />
  <part name="price" type="xsd:string" />
  <part name="photo" type="xsd:string" /></message>
<message name="createProductResponse">
  <part name="return" type="tns:Product" /></message>
<message name="getProductRequest">
  <part name="id" type="xsd:string" /></message>
<message name="getProductResponse">
  <part name="return" type="tns:Product" /></message>
<message name="getAllProductsRequest"></message>
<message name="getAllProductsResponse">
  <part name="return" type="tns:ProductList" /></message>
<message name="editProductRequest">
  <part name="id" type="xsd:int" />
  <part name="name" type="xsd:string" />
  <part name="description" type="xsd:string" />
  <part name="price" type="xsd:string" />
  <part name="photo" type="xsd:uri" /></message>
<message name="editProductResponse">
  <part name="return" type="tns:Product" /></message>
<message name="deleteProductRequest">
  <part name="id" type="xsd:int" /></message>
<message name="deleteProductResponse">
  <part name="return" type="tns:Product" /></message>
<portType name="serverPortType">
  <operation name="createProduct">
    <documentation>Get Single Product</documentation>
    <input message="tns:createProductRequest"/>
    <output message="tns:createProductResponse"/>
  </operation>
  <operation name="getProduct">
    <documentation>Get Single Product</documentation>
    <input message="tns:getProductRequest"/>
    <output message="tns:getProductResponse"/>
  </operation>
  <operation name="getAllProducts">
    <documentation>Get All Products</documentation>
    <input message="tns:getAllProductsRequest"/>
    <output message="tns:getAllProductsResponse"/>
  </operation>
  <operation name="editProduct">
    <documentation>Edit Product</documentation>
    <input message="tns:editProductRequest"/>
    <output message="tns:editProductResponse"/>
  </operation>
  <operation name="deleteProduct">
    <documentation>Delete Product</documentation>
    <input message="tns:deleteProductRequest"/>
    <output message="tns:deleteProductResponse"/>
  </operation>
</portType>
<binding name="serverBinding" type="tns:serverPortType">
  <soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
  <operation name="createProduct">
    <soap:operation soapAction="urn:server#createProduct" style="rpc"/>
    <input><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
    <output><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
  </operation>
  <operation name="getProduct">
    <soap:operation soapAction="urn:server#getProduct" style="rpc"/>
    <input><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
    <output><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
  </operation>
  <operation name="getAllProducts">
    <soap:operation soapAction="urn:server#getAllProducts" style="rpc"/>
    <input><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
    <output><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
  </operation>
  <operation name="editProduct">
    <soap:operation soapAction="urn:server#editProduct" style="rpc"/>
    <input><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
    <output><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
  </operation>
  <operation name="deleteProduct">
    <soap:operation soapAction="urn:server#deleteProduct" style="rpc"/>
    <input><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></input>
    <output><soap:body use="encoded" namespace="urn:server" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/></output>
  </operation>
</binding>
<service name="server">
  <port name="serverPort" binding="tns:serverBinding">
    <soap:address location="http://www.webscantest.com/soap/demo/api/index.php"/>
  </port>
</service>
</definitions>