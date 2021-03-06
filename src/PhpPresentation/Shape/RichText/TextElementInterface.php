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

namespace TwilRoad\PhpPresentation\Shape\RichText;

/**
 * Rich text element interface
 */
interface TextElementInterface
{
    /**
     * Get text
     *
     * @return string Text
     */
    public function getText();

    /**
     * Set text
     *
     * @param                                            $pText string   Text
     * @return \TwilRoad\PhpPresentation\Shape\RichText\TextElementInterface
     */
    public function setText($pText = '');

    /**
     * Get font
     *
     * @return \TwilRoad\PhpPresentation\Style\Font
     */
    public function getFont();

    /**
     * @return string Language
     */
    public function getLanguage();

    /**
     * @param string $lang
     * @return \TwilRoad\PhpPresentation\Shape\RichText\TextElementInterface
     */
    public function setLanguage($lang);

    /**
     * Get hash code
     *
     * @return string Hash code
     */
    public function getHashCode();
}
