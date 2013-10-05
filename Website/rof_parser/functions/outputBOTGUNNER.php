<?php
// BOTGUNNER
// translate BotGunner into more natural description
// BOSWAR version 1.2
// Oct 5, 2013
function BOTGUNNER($type) {
   // translate BotGunner into more natural description
   global $BotName; // BotGunner description

   // used in Gotha and DFW
   if ($type == "BotGunnerG5_1") { $BotName = "gunner"; } 
   elseif ($type == "BotGunnerG5_2") { $BotName = "gunner"; } 
   // used in Gotha and BW12
   if ($type == "BotGunnerBacker") { $BotName = "Becker gunner"; } 
   // used in HP400 and Felixstowe F2A
   elseif ($type == "BotGunnerHP400_1") { $BotName = "nose gunner"; }
   elseif ($type == "BotGunnerDavis") { $BotName = "Davis gunner"; } 
   // used in Breguet14, Bristol F2B and F.E.2b
   elseif ($type == "BotGunnerBreguet14") { $BotName = "gunner"; }
   // used in RE8 and DH4
   elseif ($type == "BotGunnerRE8") { $BotName = "gunner"; }
   elseif ($type == "BotGunnerHP400_2") { $BotName = "Handley Page 0/400 dorsal gunner";}
   elseif ($type == "BotGunnerHP400_2_WM") { $BotName = "Handley Page 0/400 dorsal gunner";}
   elseif ($type == "BotGunnerHP400_3") { $BotName = "Handley Page 0/400 ventral gunner";}
   elseif ($type == "BotGunnerFelix_top-twin") { $BotName = "Felixstowe F2A top gunner"; }
   elseif ($type == "BotGunnerFe2_sing") { $BotName = "F.E.2b gunner"; }
   elseif ($type == "BotGunnerBW12") { $BotName = "Brandenburg W12 gunner"; }
   elseif ($type == "BotGunnerHCL2") { $BotName = "Halberstadt CL.II gunner"; }
   else { $objecttype = "unexpected Botgunner $type<br>"; }
   


}
?>
