<?php

if (class_exists('PHP_CodeSniffer_Standards_AbstractPatternSniff', true) === false) {
    throw new PHP_CodeSniffer_Exception('Class PHP_CodeSniffer_Standards_AbstractPatternSniff not found');
}

class Becklyn_Sniffs_ControlStructures_ControlSignatureSniff extends PHP_CodeSniffer_Standards_AbstractPatternSniff
{
    /**
     * Returns the patterns that this test wishes to verify.
     *
     * @return string[]
     */
    protected function getPatterns()
    {
        return array(
            'tryEOL...{...}EOL...catch (...)EOL...{',
            'doEOL...{...}EOL...while (...);EOL',
            'while (...)EOL...{',
            'for (...)EOL{',
            'if (...)EOL...{',
            'foreach (...)EOL...{',
            '} else if (...)EOL...{',
            '} elseif (...)EOL...{',
            '} else {EOL',
        );
    }//end getPatterns()
}//end class
