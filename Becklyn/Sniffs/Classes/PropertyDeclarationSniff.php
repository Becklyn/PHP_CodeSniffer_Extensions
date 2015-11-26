<?php

class Becklyn_Sniffs_Classes_PropertyDeclarationSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(
            T_CLASS,
        );
    }//end register()

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $scope = $phpcsFile->findNext(T_FUNCTION, $stackPtr, $tokens[$stackPtr]['scope_closer']);

        $wantedTokens = array(
            T_PUBLIC,
            T_PROTECTED,
            T_PRIVATE
        );

        while ($scope) {
            $scope = $phpcsFile->findNext($wantedTokens, $scope + 1, $tokens[$stackPtr]['scope_closer']);

            if ($scope && $tokens[$scope + 2]['code'] === T_VARIABLE) {
                $phpcsFile->addError(
                    'Declare class properties before methods',
                    $scope,
                    'Invalid'
                );
            }
        }
    }//end process()

}//end class
