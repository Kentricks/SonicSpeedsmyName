<?php

/* SensioDistributionBundle:Configurator/Step:doctrine.html.twig */
class __TwigTemplate_e2d59557e6f8ce401580f8ed5aadae90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Configure database";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->env->getExtension('form')->renderer->setTheme($this->getContext($context, "form"), array(0 => "SensioDistributionBundle::Configurator/form.html.twig"));
        // line 7
        echo "
    <div class=\"step\">
        ";
        // line 9
        $this->env->loadTemplate("SensioDistributionBundle::Configurator/steps.html.twig")->display(array_merge($context, array("index" => $this->getContext($context, "index"), "count" => $this->getContext($context, "count"))));
        // line 10
        echo "
        <h1>Configure your Database</h1>
        <p>If your website needs a database connection, please configure it here.</p>

        <div class=\"symfony-form-errors\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
        </div>
        <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_configurator_step", array("index" => $this->getContext($context, "index"))), "html", null, true);
        echo "\" method=\"POST\">
            <div class=\"symfony-form-column\">
                ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "driver"), 'row');
        echo "
                ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "host"), 'row');
        echo "
                ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "name"), 'row');
        echo "
            </div>
            <div class=\"symfony-form-column\">
                ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "user"), 'row');
        echo "
                ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "password"), 'row');
        echo "
            </div>

            ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'rest');
        echo "

            <div class=\"symfony-form-footer\">
                <p>
                    <button type=\"submit\" class=\"sf-button\">
                        <span class=\"border-l\">
                            <span class=\"border-r\">
                                <span class=\"btn-bg\">NEXT STEP</span>
                            </span>
                        </span>
                    </button>
                </p>
                <p>* mandatory fields</p>
            </div>
        </form>
    </div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator/Step:doctrine.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1191 => 330,  1185 => 329,  1179 => 328,  1173 => 327,  1167 => 326,  1155 => 324,  1149 => 323,  1143 => 322,  1127 => 316,  1120 => 315,  1118 => 314,  1115 => 313,  1092 => 309,  1065 => 307,  1062 => 306,  1050 => 301,  1045 => 300,  1031 => 292,  1025 => 290,  1022 => 289,  1017 => 288,  1015 => 287,  1012 => 286,  996 => 279,  989 => 277,  986 => 276,  984 => 275,  981 => 274,  973 => 270,  968 => 268,  961 => 263,  950 => 257,  942 => 255,  939 => 254,  937 => 253,  934 => 252,  926 => 248,  897 => 235,  894 => 234,  891 => 233,  888 => 232,  885 => 231,  882 => 230,  879 => 229,  876 => 228,  873 => 227,  867 => 225,  865 => 224,  862 => 223,  854 => 217,  851 => 216,  849 => 215,  846 => 214,  838 => 210,  835 => 209,  833 => 208,  830 => 207,  822 => 203,  819 => 202,  817 => 201,  814 => 200,  806 => 196,  803 => 195,  801 => 194,  798 => 193,  790 => 189,  787 => 188,  785 => 187,  782 => 186,  774 => 182,  771 => 181,  766 => 179,  758 => 175,  753 => 173,  745 => 169,  742 => 168,  740 => 167,  737 => 166,  729 => 162,  726 => 161,  722 => 159,  719 => 158,  712 => 153,  697 => 151,  688 => 148,  685 => 147,  680 => 145,  672 => 139,  670 => 138,  668 => 136,  662 => 134,  653 => 131,  651 => 130,  648 => 129,  639 => 123,  635 => 122,  631 => 121,  627 => 120,  622 => 119,  616 => 117,  613 => 116,  611 => 115,  608 => 114,  592 => 110,  590 => 109,  571 => 104,  569 => 103,  566 => 102,  549 => 98,  537 => 96,  523 => 91,  520 => 90,  502 => 89,  485 => 81,  466 => 75,  463 => 74,  450 => 72,  448 => 71,  438 => 69,  429 => 64,  405 => 58,  364 => 41,  353 => 36,  350 => 35,  345 => 33,  342 => 32,  295 => 16,  290 => 14,  267 => 4,  260 => 330,  205 => 267,  146 => 178,  65 => 17,  20 => 1,  791 => 473,  777 => 470,  773 => 469,  756 => 174,  730 => 461,  691 => 457,  687 => 455,  683 => 146,  679 => 453,  675 => 452,  671 => 451,  667 => 135,  663 => 449,  660 => 448,  658 => 447,  630 => 445,  615 => 440,  606 => 437,  603 => 436,  587 => 108,  550 => 399,  532 => 396,  515 => 395,  512 => 394,  510 => 393,  500 => 88,  170 => 84,  385 => 160,  382 => 48,  354 => 151,  336 => 145,  330 => 141,  308 => 130,  286 => 119,  270 => 110,  237 => 93,  228 => 305,  225 => 87,  223 => 297,  218 => 286,  206 => 77,  180 => 63,  148 => 46,  332 => 116,  318 => 111,  306 => 107,  303 => 128,  291 => 102,  265 => 107,  263 => 95,  178 => 66,  175 => 65,  161 => 199,  118 => 49,  100 => 36,  400 => 180,  396 => 179,  388 => 177,  386 => 176,  378 => 170,  376 => 158,  293 => 118,  288 => 101,  276 => 113,  273 => 112,  271 => 111,  248 => 324,  243 => 92,  240 => 92,  221 => 85,  113 => 40,  63 => 21,  58 => 15,  90 => 27,  53 => 11,  242 => 96,  232 => 73,  195 => 252,  190 => 242,  181 => 61,  155 => 52,  482 => 80,  476 => 78,  465 => 1,  455 => 173,  445 => 171,  424 => 161,  416 => 61,  401 => 155,  391 => 149,  375 => 141,  367 => 42,  363 => 155,  359 => 153,  356 => 37,  352 => 129,  349 => 149,  347 => 34,  344 => 119,  334 => 27,  326 => 109,  324 => 139,  321 => 23,  319 => 105,  316 => 22,  313 => 101,  311 => 20,  304 => 96,  300 => 105,  281 => 89,  262 => 104,  257 => 84,  255 => 103,  253 => 81,  250 => 325,  238 => 319,  233 => 312,  219 => 84,  216 => 63,  213 => 274,  211 => 61,  200 => 262,  191 => 67,  188 => 90,  185 => 66,  153 => 77,  150 => 55,  110 => 38,  81 => 40,  76 => 31,  59 => 17,  34 => 4,  1819 => 553,  1813 => 552,  1807 => 551,  1801 => 550,  1795 => 549,  1789 => 548,  1783 => 547,  1777 => 546,  1771 => 545,  1755 => 539,  1748 => 538,  1746 => 537,  1743 => 536,  1720 => 532,  1695 => 531,  1693 => 530,  1690 => 529,  1678 => 524,  1674 => 523,  1671 => 522,  1668 => 521,  1665 => 520,  1662 => 519,  1659 => 518,  1657 => 517,  1654 => 516,  1645 => 509,  1642 => 508,  1640 => 507,  1637 => 506,  1628 => 501,  1625 => 500,  1623 => 499,  1620 => 498,  1603 => 494,  1597 => 492,  1594 => 491,  1576 => 490,  1574 => 489,  1571 => 488,  1563 => 482,  1556 => 480,  1553 => 476,  1549 => 475,  1545 => 473,  1540 => 470,  1538 => 466,  1535 => 465,  1532 => 464,  1530 => 463,  1527 => 462,  1520 => 457,  1513 => 455,  1510 => 451,  1506 => 450,  1503 => 449,  1499 => 447,  1496 => 443,  1493 => 442,  1491 => 441,  1488 => 440,  1480 => 436,  1478 => 435,  1475 => 434,  1468 => 429,  1465 => 428,  1458 => 424,  1453 => 423,  1451 => 422,  1448 => 421,  1439 => 415,  1435 => 414,  1431 => 412,  1429 => 411,  1426 => 410,  1418 => 405,  1413 => 404,  1407 => 402,  1404 => 401,  1402 => 397,  1400 => 396,  1397 => 395,  1388 => 389,  1384 => 388,  1379 => 386,  1368 => 385,  1366 => 384,  1363 => 383,  1356 => 380,  1353 => 379,  1345 => 374,  1341 => 373,  1336 => 372,  1330 => 370,  1324 => 368,  1321 => 367,  1319 => 366,  1316 => 365,  1308 => 361,  1306 => 357,  1304 => 356,  1301 => 355,  1292 => 348,  1276 => 347,  1272 => 345,  1269 => 344,  1266 => 343,  1263 => 342,  1260 => 341,  1257 => 340,  1254 => 339,  1251 => 338,  1248 => 337,  1245 => 336,  1242 => 335,  1239 => 334,  1236 => 333,  1234 => 332,  1231 => 331,  1222 => 327,  1206 => 326,  1202 => 324,  1199 => 323,  1196 => 322,  1193 => 321,  1190 => 320,  1187 => 319,  1184 => 318,  1181 => 317,  1178 => 316,  1175 => 315,  1172 => 314,  1169 => 313,  1166 => 312,  1164 => 311,  1161 => 325,  1140 => 306,  1137 => 305,  1134 => 304,  1131 => 303,  1128 => 302,  1125 => 301,  1122 => 300,  1119 => 299,  1116 => 298,  1113 => 297,  1110 => 296,  1107 => 295,  1104 => 294,  1102 => 293,  1099 => 292,  1091 => 286,  1088 => 285,  1086 => 284,  1083 => 283,  1075 => 279,  1072 => 278,  1070 => 277,  1067 => 308,  1059 => 272,  1056 => 271,  1054 => 270,  1051 => 269,  1043 => 299,  1040 => 298,  1038 => 263,  1035 => 262,  1027 => 258,  1024 => 257,  1021 => 256,  1019 => 255,  1016 => 254,  1008 => 250,  1005 => 281,  1003 => 248,  1000 => 247,  992 => 278,  990 => 242,  987 => 241,  979 => 237,  976 => 236,  974 => 235,  971 => 269,  963 => 230,  960 => 229,  958 => 262,  956 => 227,  953 => 226,  946 => 256,  938 => 220,  933 => 219,  927 => 217,  924 => 244,  922 => 243,  919 => 242,  911 => 208,  909 => 207,  908 => 206,  907 => 205,  906 => 204,  901 => 203,  895 => 201,  892 => 200,  890 => 199,  887 => 198,  878 => 192,  874 => 191,  870 => 226,  866 => 189,  861 => 188,  855 => 186,  852 => 185,  850 => 184,  847 => 183,  831 => 179,  829 => 178,  826 => 177,  810 => 173,  808 => 172,  805 => 171,  788 => 472,  776 => 165,  769 => 180,  767 => 161,  762 => 160,  759 => 159,  741 => 158,  739 => 157,  736 => 156,  727 => 460,  724 => 160,  721 => 149,  715 => 147,  713 => 146,  708 => 458,  705 => 144,  702 => 152,  696 => 141,  694 => 150,  686 => 139,  684 => 138,  681 => 137,  669 => 137,  664 => 131,  661 => 130,  659 => 129,  656 => 132,  647 => 123,  641 => 446,  638 => 120,  636 => 119,  633 => 118,  623 => 114,  621 => 113,  618 => 112,  610 => 438,  607 => 107,  604 => 106,  601 => 435,  599 => 104,  596 => 103,  588 => 98,  583 => 97,  577 => 95,  575 => 94,  570 => 93,  568 => 92,  565 => 91,  558 => 86,  552 => 84,  546 => 82,  544 => 81,  538 => 79,  535 => 78,  533 => 77,  530 => 93,  528 => 92,  525 => 74,  516 => 69,  514 => 68,  511 => 67,  505 => 391,  499 => 63,  497 => 87,  493 => 60,  491 => 59,  488 => 82,  481 => 53,  475 => 51,  467 => 48,  458 => 45,  456 => 44,  447 => 41,  441 => 39,  439 => 38,  433 => 35,  421 => 62,  418 => 159,  412 => 60,  395 => 151,  389 => 21,  383 => 145,  377 => 142,  371 => 138,  369 => 43,  366 => 13,  357 => 152,  351 => 150,  348 => 322,  346 => 321,  343 => 320,  339 => 146,  335 => 551,  333 => 550,  331 => 112,  329 => 26,  327 => 140,  325 => 546,  323 => 24,  320 => 544,  317 => 135,  315 => 110,  310 => 529,  307 => 97,  302 => 515,  299 => 278,  297 => 277,  292 => 15,  289 => 120,  287 => 13,  284 => 118,  282 => 462,  279 => 115,  277 => 114,  274 => 97,  272 => 6,  269 => 5,  266 => 431,  261 => 105,  259 => 103,  256 => 328,  254 => 327,  251 => 101,  249 => 100,  244 => 322,  239 => 379,  236 => 313,  234 => 365,  231 => 306,  226 => 298,  222 => 351,  217 => 70,  215 => 285,  212 => 79,  210 => 273,  207 => 68,  204 => 76,  202 => 265,  197 => 261,  194 => 275,  192 => 251,  184 => 239,  179 => 222,  174 => 214,  172 => 64,  167 => 234,  159 => 193,  152 => 198,  137 => 46,  134 => 158,  129 => 145,  127 => 60,  124 => 129,  104 => 87,  102 => 30,  97 => 23,  77 => 25,  480 => 3,  474 => 77,  469 => 76,  461 => 46,  457 => 153,  453 => 43,  444 => 149,  440 => 70,  437 => 166,  435 => 68,  430 => 34,  427 => 162,  423 => 142,  413 => 157,  409 => 183,  407 => 59,  402 => 57,  398 => 129,  393 => 52,  387 => 50,  384 => 49,  381 => 144,  379 => 47,  374 => 157,  368 => 112,  365 => 111,  362 => 161,  360 => 332,  355 => 157,  341 => 147,  337 => 117,  322 => 138,  314 => 21,  312 => 109,  309 => 108,  305 => 129,  298 => 125,  294 => 505,  285 => 115,  283 => 100,  278 => 8,  268 => 85,  264 => 3,  258 => 329,  252 => 326,  247 => 78,  241 => 321,  235 => 85,  229 => 87,  224 => 81,  220 => 295,  214 => 69,  208 => 268,  169 => 207,  143 => 43,  140 => 42,  132 => 156,  128 => 30,  119 => 114,  107 => 37,  71 => 19,  38 => 6,  177 => 64,  165 => 83,  160 => 61,  135 => 62,  126 => 144,  114 => 108,  84 => 41,  70 => 19,  67 => 16,  61 => 2,  94 => 57,  89 => 47,  85 => 26,  75 => 22,  68 => 20,  56 => 12,  87 => 26,  21 => 2,  26 => 3,  93 => 28,  88 => 28,  78 => 24,  46 => 14,  27 => 7,  44 => 8,  31 => 3,  28 => 3,  196 => 92,  183 => 70,  171 => 213,  166 => 206,  163 => 82,  158 => 80,  156 => 192,  151 => 185,  142 => 177,  138 => 34,  136 => 165,  121 => 128,  117 => 39,  105 => 34,  91 => 56,  62 => 14,  49 => 12,  24 => 2,  25 => 35,  19 => 1,  79 => 32,  72 => 21,  69 => 13,  47 => 10,  40 => 11,  37 => 7,  22 => 2,  246 => 323,  157 => 214,  145 => 74,  139 => 166,  131 => 157,  123 => 61,  120 => 20,  115 => 40,  111 => 107,  108 => 33,  101 => 86,  98 => 29,  96 => 67,  83 => 30,  74 => 20,  66 => 12,  55 => 12,  52 => 12,  50 => 10,  43 => 12,  41 => 7,  35 => 5,  32 => 6,  29 => 3,  209 => 78,  203 => 78,  199 => 93,  193 => 69,  189 => 268,  187 => 241,  182 => 223,  176 => 220,  173 => 85,  168 => 57,  164 => 200,  162 => 54,  154 => 186,  149 => 179,  147 => 75,  144 => 173,  141 => 172,  133 => 32,  130 => 39,  125 => 42,  122 => 41,  116 => 113,  112 => 39,  109 => 102,  106 => 101,  103 => 25,  99 => 68,  95 => 39,  92 => 31,  86 => 46,  82 => 25,  80 => 24,  73 => 23,  64 => 19,  60 => 20,  57 => 19,  54 => 15,  51 => 37,  48 => 10,  45 => 9,  42 => 7,  39 => 10,  36 => 5,  33 => 4,  30 => 3,);
    }
}