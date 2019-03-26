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

/**
 * TwilRoad\PhpPresentation\ShapeContainerInterface
 */
interface ShapeContainerInterface
{
    /**
    * Get collection of shapes
    *
    * @return \ArrayObject|\TwilRoad\PhpPresentation\AbstractShape[]
    */
    public function getShapeCollection();

    /**
    * Add shape to slide
    *
    * @param  \TwilRoad\PhpPresentation\AbstractShape $shape
    * @return \TwilRoad\PhpPresentation\AbstractShape
    */
    public function addShape(AbstractShape $shape);

    /**
    * Get X Offset
    *
    * @return int
    */
    public function getOffsetX();

    /**
    * Get Y Offset
    *
    * @return int
    */
    public function getOffsetY();

    /**
    * Get X Extent
    *
    * @return int
    */
    public function getExtentX();

    /**
    * Get Y Extent
    *
    * @return int
    */
    public function getExtentY();
}
