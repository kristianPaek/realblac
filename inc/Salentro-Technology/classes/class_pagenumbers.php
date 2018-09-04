<?php

class pageNumbers
{
    var $error = false;
    var $numbers = array();
    
    function pageNumbers($currentPage, $totalPages, $extraPages)
    {
        $this->checkForErrors($currentPage, $totalPages);
        if($this->error == true)
        {
            echo "error!\r\n"; exit();    
        }
        
        if(($currentPage <= ($extraPages+1)) && ($totalPages <= ($extraPages+1)))
        {
            for($i=1; $i<=$totalPages; $i++)
            {
                if($currentPage == $i)
                {
                    $this->numbers[$i] = "current";
                } else
                {
                    $this->numbers[$i] = "link";
                }
            }    
        } elseif(($currentPage <= ($extraPages+1)) && ($totalPages > ($extraPages+1)) && ($totalPages <= ($extraPages*2+1)))
        {
            for($i=1; $i<=$totalPages; $i++)
            {
                if($currentPage == $i)
                {
                    $this->numbers[$i] = "current";
                } else
                {
                    $this->numbers[$i] = "link";
                }
            }
        } elseif(($currentPage <= ($extraPages+1)) && ($totalPages > ($extraPages*2+1)))
        {
            for($i=1; $i<=($extraPages*2+1); $i++)
            {
                if($currentPage == $i)
                {
                    $this->numbers[$i] = "current";
                } else
                {
                    $this->numbers[$i] = "link";
                }
            }
            $this->numbers[$totalPages] = "separatorBefore";
        } elseif(($currentPage > ($extraPages+1)) && ($totalPages <= ($extraPages*2+1)))
        {
            for($i=1; $i<=$totalPages; $i++)
            {
                if($currentPage == $i)
                {
                    $this->numbers[$i] = "current";
                } else
                {
                    $this->numbers[$i] = "link";
                }
            }    
        } elseif(($currentPage > ($extraPages+1)) && ($totalPages > ($extraPages*2+1)))
        {
            $useSeparatorAfter = true;
            $useSeparatorBefore = true;
            
            if($currentPage == ($extraPages+2))
            {
                $startWith = 1;
                $useSeparatorAfter = false;
            } else
            {
                $startWith = $currentPage-$extraPages;
                //$useSeparatorAfter = true;
            }
            
            if($currentPage < ($totalPages-$extraPages))
            {
                if($currentPage == ($totalPages-($extraPages+1)))
                {
                    $endWith = $currentPage+($extraPages+1);
                    $useSeparatorBefore = false;
                } else
                {
                    $endWith = $currentPage+$extraPages;
                }
            } else
            {
                $endWith = $totalPages;
                $startWith = ($totalPages-($extraPages*2));
                $useSeparatorBefore = false;
            }
            
            if($useSeparatorAfter)
            {
                $this->numbers[1] = "separatorAfter";
            }
    
            for($i=$startWith; $i<=$endWith; $i++)
            {
                if($currentPage == $i)
                {
                    $this->numbers[$i] = "current";
                } else
                {
                    $this->numbers[$i] = "link";
                }
            }
            
            if($useSeparatorBefore)
            {    
                $this->numbers[$totalPages] = "separatorBefore";
            }
        }
    }
    
    function checkForErrors($page, $totalPages)
    {
        if($page > $totalPages)
        {
            $this->error = true;
        }
        
        return $this->error;
    }
} 

?>