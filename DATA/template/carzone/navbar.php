<?php

/**
 * build_menu_carzone($parent, $menu, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
 *
 * @param   $parent        -                                       | value: string         | e.g.: 0
 * @param   $menu          - array                                 |                       | e.g.: $mheader - $mfooter
 * @param   $active        - name of active page                   | value: string         | e.g.: $page
 * @param   $mainclass     - main class for 'ul'                   | value: text           | e.g.: nav navbar-nav
 * @param   $dropdown      - class for 'li' which have submenu     | value: text           | e.g.: mainsubcategory
 * @param   $dropdownclass - class for 'li a' which have submenu   | value: text           | e.g.: has-sub-menu
 * @param   $dropclass     - class for 'ul' as submenu             | value: text           | e.g.: sub-menu
 * @param   $subclass      - class for 'ul li' as submenu          | value: text           | e.g.: sub-menu-li
 * @param   $admin         - admin acces                           | value: string         | e.g.: TRUE - FALSE -
 *                         ENVO_ACCESS
 *
 * @return  UL list
 *
 *
 * Return UL list
 *
 * <ul class=" $mainclass ">
 *  <li>
 *    <a href="">Item 1</a>
 *  </li>
 *  <li>
 *    <a href="">Item 2</a>
 *  </li>
 *  <li class=" $dropdown ">
 *    <a href="" class=" $dropdownclass ">Item 3</a>
 *    <ul class=" $dropclass ">
 *      <li class=" $subclass ">
 *        <a href="">Sub-item 1</a>
 *      </li>
 *      <li class=" $subclass ">
 *        <a href="">Sub-item 2</a>
 *        <ul class=" $dropclass ">
 *          <li class=" $subclass ">
 *            <a href="">Sub-item 1</a>
 *          </li>
 *          <li class=" $subclass ">
 *            <a href="">Sub-item 2</a>
 *          </li>
 *        </ul>
 *      </li>
 *    </ul>
 *  </li>
 * </ul>
 *
 */
echo build_menu_carzone(0, $mheader, TRUE, $page, 'nav navbar-nav', '', '', 'sub-menu', '', FALSE);

?>
