<?php

namespace PaniersAbandonnes\Model;

use PaniersAbandonnes\Model\Base\PanierAbandonne as BasePanierAbandonne;

class PanierAbandonne extends BasePanierAbandonne
{
    const RAPPEL_PAS_ENVOYE = 0;
    const RAPPEL_1_ENVOYE = 1;
    const RAPPEL_2_ENVOYE = 2;
}
