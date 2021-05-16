<head>
    <!--╔═╗ CHARSET ╔════════════════════════════════════╗ START ╔════╗ -->
    <meta charset='UTF-8'/>
    <!--╚═╝ CHARSET ╚════════════════════════════════════╝  END  ╚════╝ -->
    <!--╔═╗ CSS ╔════════════════════════════════════╗ START ╔════╗ -->
    <link rel='stylesheet' type='text/css' href='style/bootstrap.min.css' />
    <link rel='stylesheet' type='text/css' href='style/style.css' />
    <link rel='stylesheet' type='text/css' href='font/font-awesome/css/font-awesome.css' />
    <!--╚═╝ CSS ╚════════════════════════════════════╝  END  ╚════╝ -->
    <!--╔═╗ JS ╔════════════════════════════════════╗ START ╔════╗ -->
    <!-- НЕОБХОДИМ ДЛЯ РАБОТЫ AJAX/JQUERY -->
    <script type='text/javascript' src='js/jquery-3.6.0.min.js'></script>
    <!-- НЕОБХОДИМ ДЛЯ ЗАГРУЗКИ ИЗОБРАЖЕНИЙ И ИХ ЭСКИЗОВ -->
    <script type='text/javascript' src='js/load-image.all.min.js'></script>
    <script type='text/javascript' src='js/p5.min.js'></script>
    <script type='text/javascript' src='js/index.js'></script>
    <!--╚═╝ JS ╚════════════════════════════════════╝  END  ╚════╝ -->
</head>
<style type="text/css">
    
</style>
<script type='text/javascript'>
    function setup() {
        let canvasDiv = document.getElementById('hideSection');
        let width = canvasDiv.clientWidth;
        let height = canvasDiv.clientHeight;
        let canvas = createCanvas(width, height);
        canvas.parent('hideSection');
    }
    function draw() {
        stroke(120);
        strokeWeight(30);
        if (mouseIsPressed === true) line(mouseX, mouseY, pmouseX, pmouseY);
    }
</script>
<body>

    <!-- ══ SCROLLBAR ════════╗ START ╔═ -->
    <div id='progressbar'></div>
    <div id='scrollPath'></div>
    <!-- ══ SCROLLBAR ════════╝  END  ╚═ -->

    <!-- ══ BOX MENU ════════╗ START ╔═ -->
    <header class='box-menu'>
        <a id='logo' href=''>LOGO</a>
        <nav id='nav'>
            <button id='btn-mobile' class='btn-menu'>MENU</button>
            <span id='span-menu' class='btn-menu'></span>

            <ul id='menu' role='menu'>
                <li><a href=''>First</a></li>
                <li><a href=''>Second</a></li>
                <li><a href=''>Third</a></li>
                <li><a href=''>Fourth</a></li>
                <li><a href=''>Fifth</a></li>
            </ul>
        </nav>
    </header>
    <!-- ══ BOX MENU ════════╝  END  ╚═ -->

    <div class='box-general'>

        <!-- ══ BOX 1 ════════╗ START ╔═ -->
        <section class='child-box box-shadow-dark' >
            <span>Block header № 1</span>

            <div class='child-box-box flex-col' >
                <div class='child-box-data'>
                    <input class='el-input el-orange el-comm brRad-lf' value='parameter 1 &nbsp;&#xf105;' readonly style='width: 100px;' />
                    <!-- 
                      *    PARAMETER
                      * class = 'js-el-data'    => имя класса используется в функции showHideChangeData()
                    -->
                    <select class='el-select el-light el-for-comm brRad-rh js-el-data' id='id_sel_1' >
                        <option selected disabled value='0'> Users </option>
                        <option value='1'> John </option>
                        <option value='2'> Mike </option>
                    </select>
                        <!-- ИЛИ -->
                    <!-- <input class='el-input el-light el-for-comm brRad-rh js-el-data' value='Полученные данные'/> -->

                    <!-- 
                      *    PARAMETER => class = 'js-ch-but'
                      * class = 'js-ch-but'     => имя класса используется в функции showHideChangeData()
                      * id    = 'add_/del_/ren_'=> первые 3 символа используется в функции showHideChangeData()
                      * alt   = 'up_light.png'  => путь к картинке, на которую будет меняться при клике
                    -->
                    <img class='js-ch-but' src='images/see_light_square.png' alt='images/up_light.png' id='' title='find' >
                        <!-- МОЖНО ДОБАВИТЬ  -->
                    <!-- <img class='js-ch-but' src='images/add_light_square.png' alt='images/up_light.png' id='add_el_1' title='Добавить '> -->
                    <!-- <img class='js-ch-but' src='images/del_light_square.png' alt='images/up_light.png' id='del_el_1' title='Удалить  '> -->
                    <!-- <img class='js-ch-but' src='images/edt_light_square.png' alt='images/up_light.png' id='ren_el_1' title='Поменять '> -->
                </div>
                <div class='child-box-change-data box-shadow-dark el-hiden'>
                    <!-- 
                      *    PARAMETER => class = 'js-new-data'
                      * class = 'js-new-data'   => устанавливается в showHideChangeData(), используется в функции saveChangeData()
                      * form = 'name function'  => используется в функции saveChangeData(), 
                      *                         имя функции которую надо выполнить после клика по .js-do-but (вручную)
                    -->
                    <input class='el-input brRad el-light js-new-data' func='sipmleFunc' placeholder='...' />
                        <!-- ИЛИ -->
                    <!-- <textarea class='el-textarea el-light js-new-data' func='sipmleFunc' placeholder='...'></textarea> -->

                    <!-- 
                      *    PARAMETER => class='js-do-but'
                      * class = 'js-ch-but'           => имя класса используется в функции showHideChangeData(), кнопка действия 
                      * alt   = 'add/del/ren'         => устанавливается в showHideChangeData(), используется в функции saveChangeData()
                      * id    = 'save/save_data.php   => используется в функции saveChangeData(), файл куда передаются данные (вручную)
                    -->
                    <img class='js-do-but' src='' alt='' id='save/save_data.php'>
                </div>
            </div>
            <div class='child-box-box flex-col'>
                <div class='child-box-data'>
                    <input class='el-input el-orange el-comm brRad-lf' value='parameter 2 &nbsp;&#xf105;' readonly style='width: 100px;' />
                    <select class='el-select el-light el-for-comm brRad-rh js-el-data' id='id_sel_2' >
                        <option selected disabled value='0'> select </option>
                        <option value='1'> option 1 </option>
                        <option value='2'> option 2 </option>
                    </select>
                    <img class='js-ch-but' src='images/add_light_square.png' alt='images/up_light.png' id='add_el_2' title='add'>
                    <img class='js-ch-but' src='images/del_light_square.png' alt='images/up_light.png' id='del_el_2' title='delete'>
                    <img class='js-ch-but' src='images/edt_light_square.png' alt='images/up_light.png' id='ren_el_2' title='change'>
                </div>
                <div class='child-box-change-data box-shadow-dark el-hiden'>
                    <textarea class='el-textarea el-light js-new-data' func='sipmleFunc' placeholder='...'></textarea>
                    <img class='js-do-but' src='' alt='' id='save/save_data.php'>
                </div>
            </div>
            <div class='child-box-box'>
                <table>
                    <tr>
                        <td>
                            <label for='id_textarea_1' class='el-label-comment'>COMMENT 1</label>
                            <textarea class='el-textarea el-light el-subject-label' id='id_textarea_1' placeholder='...' style='width: 100%;' >active comment</textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <span>File upload example</span>
            <!-- ══ БЛОК ЗАГРУЗКИ ИЗОБРАЖЕНИЯ ════════╗ START ╔═ -->
            <div class='child-box-box child-box-load-img' id=''>
                <span>loading image with thumbnail</span>
                <img src='images/add_light_square.png' name='add' alt='' class='js-ch-thumb' title='upload image'>
                <img src='images/cls_light_square.png' name='del' alt='' class='js-ch-thumb el-hiden' title='clean image'>
                <div class='child-box-box box-shadow-dark child-box-image'>
                    <input type='file' id='' class='js-load-file' />
                    <figure id='result'></figure>
                </div>
            </div>
            <!-- ══ БЛОК ЗАГРУЗКИ ИЗОБРАЖЕНИЯ ════════╝  END  ╚═ -->
            <!-- ══ БЛОК ЗАГРУЗКИ ДОКУМЕНТОВ ════════╗ START ╔═ -->
            <div class='child-box-box box-shadow'>
                <table>
                    <tr>
                        <td>
                            <div class='child-box-load-file'>
                                <span style='color: white;'>Uploaded file name ...</span>
                                <input type='file' id='' class='js-load-file'>
                                <img class='js-icon-file' src='images/no_file.png' title='no file'>
                                <img class='js-ch-thumb' src='images/upload_light.png' name='add' title='upload image'>
                                <img class='js-ch-thumb el-hiden' src='images/del_light.png' name='del' title='delete image'>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- ══ БЛОК ЗАГРУЗКИ ДОКУМЕНТОВ ════════╝  END  ╚═ -->
            <div class='child-box-box'>
                <table class='js-table-data'>
                    <tr>
                        <td>
                            <label for='id_textarea_2' class='el-label-comment'>COMMENT 2</label>
                            <textarea class='el-textarea el-light el-subject-label' id='id_textarea_2' placeholder='...' style='width: 100%;' ></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- ══ БЛОК ОТПРАВКИ ВСЕЙ ИНФОРМАЦИИ POST ЗАПРОСОМ ════════╗ START ╔═ -->
            <div class='child-box-button access-write'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='prt' id='save/save_data.php' src='images/print_light.png' title='print'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='sav' id='save/save_data.php' src='images/save_light.png' title='save'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='del' id='save/save_data.php' src='images/del_light.png' title='delete'>
            </div>
            <!-- ══ БЛОК ОТПРАВКИ ВСЕЙ ИНФОРМАЦИИ POST ЗАПРОСОМ ════════╝  END  ╚═ -->
        </section>
        <!-- ══ BOX 1 ════════╝  END  ╚═ -->

        <!-- ══ БЛОК 2 ════════╗ START ╔═ -->
        <section class='child-box box-shadow-light' >
            <span>Заголовок блока № 2</span>

            <div class='child-box-box flex-col'>
                <div class='child-box-data'>
                    <input class='el-input el-orange el-comm brRad-lf' value='параметр 1 &nbsp;&#xf105;' readonly style='width: 100px;' />
                    <input class='el-input el-light el-for-comm brRad-rh js-el-data' value='ваши данные'/>
                    <img class='js-ch-but' src='images/add_dark_square.png' alt='images/up_dark.png' id='add_el_3' title='Добавить '>
                    <img class='js-ch-but' src='images/del_dark_square.png' alt='images/up_dark.png' id='del_el_3' title='Удалить  '>
                    <img class='js-ch-but' src='images/edt_dark_square.png' alt='images/up_dark.png' id='ren_el_3' title='Изменить '>
                </div>
                <div class='child-box-change-data box-shadow-light el-hiden'>
                    <textarea class='el-textarea el-light js-new-data' func='sipmleFunc' placeholder='...'></textarea>
                    <img class='js-do-but' src='' alt='' id='save/save_data.php'>
                </div>
            </div>
            <div class='child-box-box'>
                <table>
                    <tr>
                        <td>
                            <label for='id_textarea_3' class='el-label-comment'>Комментарий 1</label>
                            <textarea class='el-textarea el-light el-subject-label' id='id_textarea_3' placeholder='...' style='width: 100%;' >Так выглядит активный comment</textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <span>Пример загрузки файлов</span>
            <!-- ══ БЛОК ЗАГРУЗКИ ИЗОБРАЖЕНИЯ ════════╗ START ╔═ -->
            <div class='child-box-box child-box-load-img' id=''>
                <span>ЗАГРУЗКА С ЭСКИЗОМ</span>
                <img src='images/add_dark_square.png' name='add' alt='' class='js-ch-thumb' title='загрузить изображение'>
                <img src='images/cls_dark_square.png' name='del' alt='' class='js-ch-thumb el-hiden' title='удалить изображение'>
                <div class='child-box-box box-shadow-light child-box-image'>
                    <input type='file' id='' class='js-load-file' />
                    <figure id='result'></figure>
                </div>
            </div>
            <!-- ══ БЛОК ЗАГРУЗКИ ИЗОБРАЖЕНИЯ ════════╝  END  ╚═ -->
            <!-- ══ БЛОК ЗАГРУЗКИ ДОКУМЕНТОВ ════════╗ START ╔═ -->
            <div class='child-box-box box-shadow'>
                <table>
                    <tr>
                        <td>
                            <div class='child-box-load-file'>
                                <span>Имя загруженного файла ...</span>
                                <input type='file' id='' class='js-load-file'>
                                <img class='js-icon-file' src='images/no_file.png' title='no file'>
                                <img class='js-ch-thumb' src='images/upload_dark.png' name='add' title='загрузить изображение'>
                                <img class='js-ch-thumb el-hiden' src='images/del_dark.png' name='del' title='удалить изображение'>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- ══ БЛОК ЗАГРУЗКИ ДОКУМЕНТОВ ════════╝  END  ╚═ -->
            <div class='child-box-box'>
                <table class='js-table-data'>
                    <tr>
                        <td>
                            <label for='id_textarea_4' class='el-label-comment'>Комментарий 2</label>
                            <textarea class='el-textarea el-light el-subject-label' id='id_textarea_4' placeholder='...' style='width: 100%;' ></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- ══ БЛОК ОТПРАВКИ ВСЕЙ ИНФОРМАЦИИ POST ЗАПРОСОМ ════════╗ START ╔═ -->
            <div class='child-box-button access-write'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='prt' id='save/save_data.php' src='images/print_dark.png' title='печать'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='sav' id='save/save_data.php' src='images/save_dark.png' title='сохранить'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='del' id='save/save_data.php' src='images/del_dark.png' title='удалить'>
            </div>
            <!-- ══ БЛОК ОТПРАВКИ ВСЕЙ ИНФОРМАЦИИ POST ЗАПРОСОМ ════════╝  END  ╚═ -->
        </section>
        <!-- ══ БЛОК 2 ════════╝  END  ╚═ -->

        <!-- ══ BOX 3 ════════╗ START ╔═ -->
        <section class='child-box box-shadow-dark' id='box3'>
            <span>Block header № 3</span>
            <div class='child-box-box'>
                <table class='js-table-data el-table-dark'>
                    <tr>
                        <td>string 1.1</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>string 1.2</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>string 1.3</td>
                        <td>...</td>
                    </tr>
                </table>
                <table class='js-table-data el-table-light'>
                    <tr>
                        <td>string 2.1</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>string 2.2</td>
                        <td>...</td>
                    </tr>
                    <tr>
                        <td>string 2.3</td>
                        <td>...</td>
                    </tr>
                </table>
            </div>
            <div class='child-box-box flex-col'>
                <span>Dark style with filter</span>
                <table class='js-table-data el-table-dark el-table-filter'>
                    <tr>
                        <th style="width:70px;">
                            <input class='el-input el-orange js-el-filter' value=''/>
                            <label class="fa fa-search"></label>
                        </th>
                        <th style="width:50px;">
                            <input class='el-input el-orange js-el-filter' value='' />
                            <label class="fa fa-search"></label>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <span class='el-name-column el-red'> Name column 1</span>
                        </th>
                        <th>
                            <span class='el-name-column el-red'> Name column 2</span>
                        </th>
                    </tr>
                    <tr>
                        <td>data 1</td>
                        <td>data 2</td>
                    </tr>
                    <tr>
                        <td>data 3</td>
                        <td>data 4</td>
                    </tr>
                    <tr>
                        <td>data 5</td>
                        <td>data 6</td>
                    </tr>
                </table>
            </div>
        <div class='child-box-box flex-col' id='hideSection'>
            <span style='color: #ffdc75;'>Reveal Content Effects using p5.js <br> Need to include type='text/javascript' src='js/p5.min.js'  </span>
            <div class='child-box-box content'>
                <p>
                    Here is your hidden content<br>
                    Here is your hidden content<br>
                </p>
            </div>
        </div>
            <!-- ══ PRINT TABLE DATA ════════╗ START ╔═ -->
            <div class='child-box-button access-write'>
                <img class='js-post-but' alt='' func='sipmleFunc' name='prt' id='save/save_data.php' src='images/print_light.png' title='print'>
            </div>
            <!-- ══ PRINT TABLE DATA ════════╝  END  ╚═ -->
        </section>
        <!-- ══ BOX 3 ════════╝  END  ╚═ -->

        <!-- ══ BOX 4 (SMOKE) ════════╗ START ╔═ -->
        <section class='child-box box-shadow-dark' style='width: 250px;'>
            <span>Smoke effect css</span>
            <div class='child-box-box'>
                <p class='smoke'>
                    Hover over this text and you  <br>
                    will see its spectacular disappearance
                </p>
            </div>
            <div class='child-box-box'>
                <p class='smoke'>
                    Наведи курсор на этот текст и ты  <br>
                    увидешь его эффектное исчезновение 
                </p>
            </div>
        </section>
        <!-- ══ BOX 4 (SMOKE) ════════╝  END  ╚═ -->

    </div>
</body>