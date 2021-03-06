<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (https://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Tests\Unit;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;

class FakeHtmlRenderer implements ElementRendererInterface
{
    protected $options;

    /**
     * @param string     $option
     * @param mixed|null $value
     */
    public function setOption($option, $value)
    {
        $this->options[$option] = $value;
    }

    /**
     * @param string     $option
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    public function getOption($option, $default = null)
    {
        if (!isset($this->options[$option])) {
            return $default;
        }

        return $this->options[$option];
    }

    /**
     * @param string $string
     * @param bool   $preserveEntities
     *
     * @return string
     *
     * @deprecated
     */
    public function escape($string, $preserveEntities = false)
    {
        return 'YOU SHOULD NEVER SEE THIS STRING';
    }

    /**
     * @param AbstractInline[] $inlines
     *
     * @return string
     */
    public function renderInlines($inlines)
    {
        return '::inlines::';
    }

    /**
     * @param AbstractBlock $block
     * @param bool          $inTightList
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function renderBlock(AbstractBlock $block, $inTightList = false)
    {
        return '::block::';
    }

    /**
     * @param AbstractBlock[] $blocks
     * @param bool            $inTightList
     *
     * @return string
     */
    public function renderBlocks($blocks, $inTightList = false)
    {
        return '::blocks::';
    }
}
