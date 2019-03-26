<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/TwilRoad/PHPPresentation/contributors.
 *
 * @link        https://github.com/TwilRoad/PHPPresentation
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace TwilRoad\PhpPresentation;

use TwilRoad\PhpPresentation\Shape\Chart;
use TwilRoad\PhpPresentation\Shape\RichText;
use TwilRoad\PhpPresentation\Shape\Table;
use TwilRoad\PhpPresentation\Slide\AbstractSlide;
use TwilRoad\PhpPresentation\Slide\Note;
use TwilRoad\PhpPresentation\Slide\SlideLayout;

/**
 * Slide class
 */
class Slide extends AbstractSlide implements ComparableInterface, ShapeContainerInterface
{
    /**
     * The slide is shown in presentation
     * @var bool
     */
    protected $isVisible = true;

    /**
     * Slide layout
     *
     * @var SlideLayout
     */
    private $slideLayout;

    /**
     * Slide master id
     *
     * @var integer
     */
    private $slideMasterId = 1;

    /**
     *
     * @var \TwilRoad\PhpPresentation\Slide\Note
     */
    private $slideNote;

    /**
     *
     * @var \TwilRoad\PhpPresentation\Slide\Animation[]
     */
    protected $animations = array();

    /**
     * Name of the title
     *
     * @var string
     */
    protected $name;

    /**
     * Create a new slide
     *
     * @param PhpPresentation $pParent
     */
    public function __construct(PhpPresentation $pParent = null)
    {
        // Set parent
        $this->parent = $pParent;
        // Shape collection
        $this->shapeCollection = new \ArrayObject();
        // Set identifier
        $this->identifier = md5(rand(0, 9999) . time());
        // Set Slide Layout
        if ($this->parent instanceof PhpPresentation) {
            $arrayMasterSlides = $this->parent->getAllMasterSlides();
            $oMasterSlide = reset($arrayMasterSlides);
            $arraySlideLayouts = $oMasterSlide->getAllSlideLayouts();
            $oSlideLayout = reset($arraySlideLayouts);
            $this->setSlideLayout($oSlideLayout);
        }
    }

    /**
     * Get slide layout
     *
     * @return SlideLayout
     */
    public function getSlideLayout()
    {
        return $this->slideLayout;
    }

    /**
     * Set slide layout
     *
     * @param  SlideLayout $layout
     * @return \TwilRoad\PhpPresentation\Slide
     */
    public function setSlideLayout(SlideLayout $layout)
    {
        $this->slideLayout = $layout;
        return $this;
    }

    /**
     * Get slide master id
     *
     * @return int
     */
    public function getSlideMasterId()
    {
        return $this->slideMasterId;
    }

    /**
     * Set slide master id
     *
     * @param  int $masterId
     * @return \TwilRoad\PhpPresentation\Slide
     */
    public function setSlideMasterId($masterId = 1)
    {
        $this->slideMasterId = $masterId;

        return $this;
    }

    /**
     * Copy slide (!= clone!)
     *
     * @return \TwilRoad\PhpPresentation\Slide
     */
    public function copy()
    {
        $copied = clone $this;

        return $copied;
    }

    /**
     *
     * @return \TwilRoad\PhpPresentation\Slide\Note
     */
    public function getNote()
    {
        if (is_null($this->slideNote)) {
            $this->setNote();
        }
        return $this->slideNote;
    }

    /**
     *
     * @param \TwilRoad\PhpPresentation\Slide\Note $note
     * @return \TwilRoad\PhpPresentation\Slide
     */
    public function setNote(Note $note = null)
    {
        $this->slideNote = (is_null($note) ? new Note() : $note);
        $this->slideNote->setParent($this);

        return $this;
    }

    /**
     * Get the name of the slide
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the slide
     * @param string $name
     * @return $this
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isVisible()
    {
        return $this->isVisible;
    }

    /**
     * @param boolean $value
     * @return Slide
     */
    public function setIsVisible($value = true)
    {
        $this->isVisible = (bool)$value;
        return $this;
    }

    /**
     * Add an animation to the slide
     *
     * @param  \TwilRoad\PhpPresentation\Slide\Animation
     * @return Slide
     */
    public function addAnimation($animation)
    {
        $this->animations[] = $animation;
        return $this;
    }

    /**
     * Get collection of animations
     *
     * @return \TwilRoad\PhpPresentation\Slide\Animation[]
     */
    public function getAnimations()
    {
        return $this->animations;
    }

    /**
     * Set collection of animations
     * @param \TwilRoad\PhpPresentation\Slide\Animation[] $array
     * @return Slide
     */
    public function setAnimations(array $array = array())
    {
        $this->animations = $array;
        return $this;
    }
}
