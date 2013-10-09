<?php
// BOTGUNNER
// translate BotGunner into more natural description
// BOSWAR version 1.3
// Oct 9, 2013
function BOTGUNNER($type) {
   // translate BotGunner into more natural description
   global $objectdesc; // object description

   // used in Gotha and DFW
   if ($type == "BotGunnerG5_1") { $objectdesc = "gunner"; } 
   elseif ($type == "BotGunnerG5_2") { $objectdesc = "gunner"; } 
   // used in Gotha and BW12
   if ($type == "BotGunnerBacker") { $objectdesc = "Becker gunner"; } 
   // used in HP400 and Felixstowe F2A
   elseif ($type == "BotGunnerHP400_1") { $objectdesc = "nose gunner"; }
   elseif ($type == "BotGunnerDavis") { $objectdesc = "Davis gunner"; } 
   // used in Breguet14, Bristol F2B and F.E.2b
   elseif ($type == "BotGunnerBreguet14") { $objectdesc = "gunner"; }
   // used in RE8 and DH4
   elseif ($type == "BotGunnerRE8") { $objectdesc = "gunner"; }
   elseif ($type == "BotGunnerHP400_2") { $objectdesc = "Handley Page 0/400 dorsal gunner";}
   elseif ($type == "BotGunnerHP400_2_WM") { $objectdesc = "Handley Page 0/400 dorsal gunner";}
   elseif ($type == "BotGunnerHP400_3") { $objectdesc = "Handley Page 0/400 ventral gunner";}
   elseif ($type == "BotGunnerFelix_top-twin") { $objectdesc = "Felixstowe F2A top gunner"; }
   elseif ($type == "BotGunnerFe2_sing") { $objectdesc = "F.E.2b gunner"; }
   elseif ($type == "BotGunnerBW12") { $objectdesc = "Brandenburg W12 gunner"; }
   elseif ($type == "BotGunnerHCL2") { $objectdesc = "Halberstadt CL.II gunner"; }
   else { $objecttype = "unexpected Botgunner $type<br>"; }
   


}
?>
