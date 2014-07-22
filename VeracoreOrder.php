<?php

class VeracoreOrder
{

    protected $order;

    public function __construct()
    {
        $this->order = new stdClass();
        $this->order->Header = new stdClass();
        $this->order->Classification = new stdClass();
        $this->order->Shipping = new stdClass();
        $this->order->Money = new stdClass();
        $this->order->Payment = new stdClass();
        $this->order->OrderVariables = new stdClass();
        $this->order->OrderedBy = new stdClass();
        $this->order->ShipTo = new stdClass();
        $this->order->BillTo = new stdClass();
        $this->order->Offers = new stdClass();
        $this->order->OrderRecurrenceSchedule = new stdClass();
        $this->order->OrderBudget = new stdClass();
    }

    public function setHeader($ID, $Comments)
    {
        $this->order->Header->ID = $ID;
        $this->order->Header->Comments = $Comments;
    }

    public function setShipTo($fullName, $cityStateZip, $cityStateZipCountry, $comments, $flag = 'Other', $shipToKey = 1)
    {
        $this->order->ShipTo->OrderShipTo = new stdClass();

        $this->order->ShipTo->OrderShipTo->Flag = $flag;
        $this->order->ShipTo->OrderShipTo->FullName = $fullName;
        $this->order->ShipTo->OrderShipTo->CityStateZip = $cityStateZip;
        $this->order->ShipTo->OrderShipTo->CityStateZipCountry = $cityStateZipCountry;
        $this->order->ShipTo->OrderShipTo->Comments = $comments;
        $this->order->ShipTo->OrderShipTo->Key = $shipToKey;
    }

    public function setBillTo($fullName, $cityStateZip, $cityStateZipCountry, $comments, $flag = 'Other')
    {

        $this->order->BillTo->Flag = $flag;
        $this->order->BillTo->FullName = $fullName;
        $this->order->BillTo->CityStateZip = $cityStateZip;
        $this->order->BillTo->CityStateZipCountry = $cityStateZipCountry;
        $this->order->BillTo->Comments = $comments;
    }

    public function addOffer($quantity = 1, $offerId, $shipToKey = 1)
    {
        $this->order->Offers->OfferOrdered = new stdClass();
        $this->order->Offers->OfferOrdered->Offer = new stdClass();
        $this->order->Offers->OfferOrdered->Offer->Header = new stdClass();
        $this->order->Offers->OfferOrdered->OrderShipTo = new stdClass();

        $this->order->Offers->OfferOrdered->Quantity = $quantity;
        $this->order->Offers->OfferOrdered->OrderShipTo->Key = $shipToKey;
        $this->order->Offers->OfferOrdered->Offer->Header->ID = $offerId;
    }

    public function getOrder()
    {
        return $this->order;
    }

}