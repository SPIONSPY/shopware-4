<?php
/**
 * Shopware 4
 * Copyright © shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace   Shopware\Models\Country;
use         Shopware\Components\Model\ModelEntity,
            Doctrine\ORM\Mapping AS ORM;

/**
 *
 * Shopware country model represents a single country.
 * <br>
 * The Shopware country model represents a row of the s_core_countries table.
 * One country has the follows associations:
 * <code>
 *
 * </code>
 * The s_core_countries table has the follows indices:
 * <code>

 * </code>
 *
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="s_core_countries")
 * @ORM\HasLifecycleCallbacks
 */
class Country extends ModelEntity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="countryname", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string $iso
     *
     * @ORM\Column(name="countryiso", type="string", length=255, nullable=false)
     */
    private $iso;

    /**
     * @var string $en
     *
     * @ORM\Column(name="countryen", type="string", length=70, nullable=false)
     */
    private $isoName;

    /**
     * @var integer $position
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var string $description
     *
     * @ORM\Column(name="notice", type="text", nullable=false)
     */
    private $description;

    /**
     * @var bool $shippingFree
     *
     * @ORM\Column(name="shippingfree", type="boolean", nullable=false)
     */
    private $shippingFree;

    /**
     * @var integer $taxFree
     *
     * @ORM\Column(name="taxfree", type="integer", nullable=false)
     */
    private $taxFree;

    /**
     * @var integer $taxFreeUstId
     *
     * @ORM\Column(name="taxfree_ustid", type="integer", nullable=false)
     */
    private $taxFreeUstId;

    /**
     * @var integer $taxFreeUstIdChecked
     *
     * @ORM\Column(name="taxfree_ustid_checked", type="integer", nullable=false)
     */
    private $taxFreeUstIdChecked;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var string $iso3
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=false)
     */
    private $iso3;

    /**
    * @var integer $displayStateInRegistration
    *
    * @ORM\Column(name="display_state_in_registration", type="boolean", nullable=false)
    */
    private $displayStateInRegistration;

    /**
    * @var integer $forceStateInRegistration
    *
    * @ORM\Column(name="force_state_in_registration", type="boolean", nullable=false)
    */
    private $forceStateInRegistration;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="Shopware\Models\Payment\Payment", mappedBy="countries")
     * @ORM\JoinTable(name="s_core_paymentmeans_countries",
     *      joinColumns={@ORM\JoinColumn(name="countryID", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="paymentID", referencedColumnName="id")}
     * )
    */
    private $payments;

    /**
     * OWNING SIDE
     * The area property is the owning side of the association between area and countries.
     * The association is joined over the area id field and the areaID field of the country.
     *
     * @var \Shopware\Models\Country\Area $area
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Country\Area", inversedBy="countries")
     * @ORM\JoinColumn(name="areaID", referencedColumnName="id")
     */
    protected $area;

    /**
     * INVERSE SIDE
     * The countries property is the inverse side of the association between area and countries.
     * The association is joined over the area id field and the areaID field of the country.
     *
     * @ORM\OneToMany(targetEntity="Shopware\Models\Country\State", mappedBy="country", orphanRemoval=true, cascade={"persist"})
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $states;

    /**
     * INVERSE SIDE
     * @ORM\OneToOne(targetEntity="Shopware\Models\Attribute\Country", mappedBy="country", orphanRemoval=true, cascade={"persist"})
     * @var \Shopware\Models\Attribute\Country
     */
    protected $attribute;

    /**
     * @var integer $areaId
     * @ORM\Column(name="areaID", type="integer", nullable=false)
     */
    private $areaId;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set iso
     *
     * @param string $iso
     * @return Country
     */
    public function setIso($iso)
    {
        $this->iso = $iso;
        return $this;
    }

    /**
     * Get iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set en
     *
     * @param $isoName
     * @return Country
     */
    public function setIsoName($isoName)
    {
        $this->isoName = $isoName;
        return $this;
    }

    /**
     * Get en
     *
     * @return string
     */
    public function getIsoName()
    {
        return $this->isoName;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Country
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Country
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set shippingFree
     *
     * @param bool $shippingFree
     * @return Country
     */
    public function setShippingFree($shippingFree)
    {
        $this->shippingFree = $shippingFree;
        return $this;
    }

    /**
     * Get shippingFree
     *
     * @return bool
     */
    public function getShippingFree()
    {
        return $this->shippingFree;
    }

    /**
     * Set taxFree
     *
     * @param integer $taxFree
     * @return Country
     */
    public function setTaxFree($taxFree)
    {
        $this->taxFree = $taxFree;
        return $this;
    }

    /**
     * Get taxFree
     *
     * @return integer
     */
    public function getTaxFree()
    {
        return $this->taxFree;
    }

    /**
     * Set taxFreeUstId
     *
     * @param integer $taxFreeUstId
     * @return Country
     */
    public function setTaxFreeUstId($taxFreeUstId)
    {
        $this->taxFreeUstId = $taxFreeUstId;
        return $this;
    }

    /**
     * Get taxFreeUstId
     *
     * @return integer
     */
    public function getTaxFreeUstId()
    {
        return $this->taxFreeUstId;
    }

    /**
     * Set taxFreeUstIdChecked
     *
     * @param integer $taxFreeUstIdChecked
     * @return Country
     */
    public function setTaxFreeUstIdChecked($taxFreeUstIdChecked)
    {
        $this->taxFreeUstIdChecked = $taxFreeUstIdChecked;
        return $this;
    }

    /**
     * Get taxFreeUstIdChecked
     *
     * @return integer
     */
    public function getTaxFreeUstIdChecked()
    {
        return $this->taxFreeUstIdChecked;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Country
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set iso3
     *
     * @param string $iso3
     * @return Country
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
        return $this;
    }

    /**
     * Get iso3
     *
     * @return string
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * @return \Shopware\Models\Attribute\Country
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param \Shopware\Models\Attribute\Country|array|null $attribute
     * @return \Shopware\Models\Attribute\Country
     */
    public function setAttribute($attribute)
    {
        return $this->setOneToOne($attribute, '\Shopware\Models\Attribute\Country', 'attribute', 'country');
    }
    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|array|null $states
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function setStates($states)
    {
        return $this->setOneToMany($states, '\Shopware\Models\Country\State', 'states', 'country');
    }

    /**
     * OWNING SIDE
     * of the association between countries and area
     * @return \Shopware\Models\Country\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param \Shopware\Models\Country\Area|array|null $area
     * @return \Shopware\Models\Country\Country
     */
    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }


/**
    * @return \Doctrine\Common\Collections\ArrayCollection
    */
    public function getPayments()
    {
        return $this->payments;
    }

   /**
    * @param \Doctrine\Common\Collections\ArrayCollection $payments
    * @return Country
    */
    public function setPayments($payments)
    {
        $this->payments = $payments;
        return $this;
    }

    /**
     * @param int $displayStateInRegistration
     */
    public function setDisplayStateInRegistration($displayStateInRegistration)
    {
        $this->displayStateInRegistration = $displayStateInRegistration;
    }

    /**
     * @return int
     */
    public function getDisplayStateInRegistration()
    {
        return $this->displayStateInRegistration;
    }

    /**
     * @param boolean $forceStateInRegistration
     */
    public function setForceStateInRegistration($forceStateInRegistration)
    {
        $this->forceStateInRegistration = $forceStateInRegistration;
    }

    /**
     * @return boolean
     */
    public function getForceStateInRegistration()
    {
        return $this->forceStateInRegistration;
    }
}
