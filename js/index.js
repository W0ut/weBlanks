"use strict";

$(document).ready( () => {
    // Here we will write the functions that will be executed when the page is loaded
    checkClassComment();
});

$(document).on('blur', '.el-subject-label', toggleClassComment);
$(document).on('click', '.el-subject-label', hideClassComm);
$(document).on('click', '.js-ch-but', showHideChangeData);
$(document).on('click', '.js-do-but', saveChangeData);
$(document).on('click', '.js-post-but', saveDataFromBox);
$(document).on('change', '.js-load-file', uploadImageWithThumb);
$(document).on('click', '.js-ch-thumb', clickLoad);
$(document).on('keyup', '.js-el-filter', filterAndHidenTrTable);

/* ══ CHANGE THE CLASSES OF THE OBJECT ════════╗ START ╔═ */
const toggleClass = (obj = this, class1, class2) => {
    if (class1) obj.classList.remove(class1);
    if (class2) obj.classList.add(class2);
};
/* ══ CHANGE THE CLASSES OF THE OBJECT ════════╝  END  ╚═ */

/* ══ SWITCHING THE PICTURE BUTTON (WE CHANGE THE VALUES OF ATTRIBUTES SRC AND ALT IN PLACES) ════════╗ START ╔═ */
const switchSrcAlt = (obj = this, src = obj.src, alt = obj.alt) => {
    obj.src = alt;
    obj.alt = src;
};
/* ══ SWITCHING THE PICTURE BUTTON (WE CHANGE THE VALUES OF ATTRIBUTES SRC AND ALT IN PLACES) ════════╝  END  ╚═ */

const getAllSiblings = ($el) => {
    let siblings = [];
    let sibling = $el.parentNode.firstChild;
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== $el) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling
    }
    return siblings;
};

const getFoundSiblings = ($el, find = 'input') => {
    let fndSibl = [];
    let arrSibl = $el.parentNode.querySelectorAll(find);
    arrSibl.forEach( (item) => { if (item.nodeType === 1 && item !== $el) { fndSibl.push(item) } });
        return fndSibl;
};

function sipmleFunc() {
    console.log('The function to be executed after POST');
}


/* ══ RESET ELEMETS CHILD BOX DATA ════════╗ START ╔═ */
function resetElemBoxData(obj) {
    const $boxChange        = obj.parentElement;
    const $firstElemBoxData = $boxChange.previousElementSibling.firstChild;

    let siblings = getAllSiblings($firstElemBoxData);

    siblings.forEach( (item) => {
        item.classList.remove('el-disabled');
        if ( item?.alt === obj.src ) switchSrcAlt(item);
    });

    obj.src = '';
    obj.alt = '';
    toggleClass($boxChange,'el-flex', 'el-hiden');
}
/* ══ RESET ELEMETS CHILD BOX DATA ════════╝  END  ╚═ */

/* ══ GET VALUE & ID OBJECT ════════╗ START ╔═ */
function getValAndId(obj) {
    let nameTag, id, val;
    obj ? nameTag = obj.tagName : nameTag = ''
    switch (nameTag) {
        case 'SELECT':
            id  = obj?.options[obj.selectedIndex].value;
            val = obj?.options[obj.selectedIndex].text;
            break;
        case 'INPUT':
            id  = obj?.id;
            val = obj?.value;
            break;
        case 'TEXTAREA':
            id  = obj?.id;
            val = obj?.value;
            break;
        default:
    }
    return {id, val, nameTag};
}
/* ══ GET VALUE & ID OBJECT ════════╝  END  ╚═ */

/* ══ SET VALUE & ID OBJECT ════════╗ START ╔═ */
function setValAndId(obj, id = '', val = '') {
    let nameTag;
    obj ? nameTag = obj.tagName : nameTag = ''
    switch (nameTag) {
        case 'SELECT':
            obj.options[obj.selectedIndex].value = id;
            obj.options[obj.selectedIndex].text  = val;
            break;
        case 'INPUT':
            obj.id    = id;
            obj.value = val;
            break;
        case 'TEXTAREA':
            obj.id    = id;
            obj.value = val;
            break;
        default:
    }
}
/* ══ SET VALUE & ID OBJECT ════════╝  END  ╚═ */

/* ══ SHOWING / HIDING THE EDIT DIV ════════╗ START ╔═ */
function showHideChangeData() {

    const $chBut   = this;
    const act      = this.id.substring(0,3);    /* ══ define action (add/del/ren/see) ══ */
    const alt      = this.alt;
    const src      = this.src;
    const $boxData = this.parentElement;
    const $data    = $boxData.querySelector('.js-el-data');

    let siblings = getAllSiblings($chBut);

    const result = getValAndId($data);

    const $boxChange = $boxData.parentElement.querySelector('.child-box-change-data');
    const $doBut     = $boxChange.querySelector('.js-do-but');
    const $newData   = $boxChange.querySelector('.js-new-data');

    if ( $boxChange.classList.contains('el-hiden') ) {
        switchSrcAlt($chBut);
        $doBut.src = src;
        $doBut.alt = act;
        toggleClass($boxChange,'el-hiden', 'el-flex');
        setValAndId($newData, result.id, result.val);
        siblings.forEach( (item) => item.classList.add('el-disabled') );
        $newData.focus();
    } else {
        switchSrcAlt($chBut);
        $doBut.src = '';
        $doBut.alt = '';
        setValAndId($newData);
        toggleClass($boxChange,'el-flex', 'el-hiden');
        siblings.forEach( (item) => item.classList.remove('el-disabled') );
    }

}
/* ══ SHOWING / HIDING THE EDIT DIV ════════╝  END  ╚═ */

/* ══ SAVE CHILD-BOX-DATA ════════╗ START ╔═ */
function saveChangeData() {
    let jsVal, jsId;
    const $doBut = this;
    const func        = $doBut.parentElement.querySelector('.js-new-data').getAttribute('func');
    const act        = this.alt;    /* ══ define action (add/del/ren/see) ══ */
    const postFile   = this.id;    /* ══ path to parameter passing file ══ */

    let arrData = [];    /* ══ array where we will insert data from the block ══ */

    let i = 0;
    let siblings = getAllSiblings($doBut);
    siblings.forEach( (item) => {
        if ( item.classList.contains('js-new-data') ) {
            const result = getValAndId(item);
            jsId  = result.id;  
            jsVal = result.val;  
        }
        let id = item?.id;
        let val = item?.value;
        arrData[i] = {val:val, id:id};
        i++;
    });

    const $selData = $doBut.parentElement.parentElement.querySelector('.js-el-data');
    
    const data = {arrData:arrData, act:act};
    $.ajax({
        url: postFile,
        method:"POST",
        data: data,
        success: function(result)
        {
            if (func) window[func]();    /* ══ function to update data in the field js-el-data ══ */
            setTimeout(function() {
                setValAndId($selData, jsId, jsVal);    
                resetElemBoxData($doBut);
                setTimeout( () => alert(result), 100);
            }, 100);
        }
    });
}
/* ══ SAVE CHILD-BOX-DATA ════════╝  END  ╚═ */

/* ══ MANAGING CLASS COMMENTS el-label-comment ════════╗ START ╔═ */

/* ══ WHEN LOADING THE PAGE WE CHECK ALL COMMENTS ════════╗ START ╔═ */
function checkClassComment() {
    let arrComm = document.querySelectorAll('.el-subject-label');
    arrComm.forEach( (item) => {
        let $com = item.previousElementSibling;
        let result = getValAndId(item);
        ( result.val !== '' ) ? toggleClass($com, 'el-label-comment', 'el-label-comment-on') :
            toggleClass($com, 'el-label-comment-on', 'el-label-comment');
    })
}
/* ══ WHEN LOADING THE PAGE WE CHECK ALL COMMENTS ════════╝  END  ╚═ */

/* ══ CHECK AFTER EDITING THE FIELD WITH A COMMENT ════════╗ START ╔═ */
function toggleClassComment() {
    let $com = this.previousElementSibling;
    let result = getValAndId(this);
    ( result.val !== '' ) ? toggleClass($com, 'el-label-comment', 'el-label-comment-on') :
        toggleClass($com, 'el-label-comment-on', 'el-label-comment');
}
/* ══ CHECK AFTER EDITING THE FIELD WITH A COMMENT ════════╝  END  ╚═ */

/* ══ ON CLICK ALWAYS HIDDEN COMMENT ════════╗ START ╔═ */
function hideClassComm() {
    toggleClass(this.previousElementSibling, 'el-label-comment', 'el-label-comment-on');
}
/* ══ ON CLICK ALWAYS HIDDEN COMMENT ════════╝  END  ╚═ */

/* ══ MANAGING CLASS COMMENTS el-label-comment ════════╝  END  ╚═ */

/* ══ CONVERTING A JSON ARRAY INTO FORMDATA ════════╗ START ╔═ */
function createFormData(formData, data, key) {
    if ( ( typeof data === 'object' && data !== null ) || Array.isArray(data) ) {
        for ( let i in data ) {
            if ( ( typeof data[i] === 'object' && data[i] !== null ) || Array.isArray(data[i]) ) {
                createFormData(formData, data[i], key + '[' + i + ']');
            } else {
                formData.append(key + '[' + i + ']', data[i]);
            }
        }
    } else {
        formData.append(key, data);
    }
}
/* ══ CONVERTING A JSON ARRAY INTO FORMDATA ════════╝  END  ╚═ */

/* ══ SAVE DATA FROM BOX ════════╗ START ╔═ */
function saveDataFromBox() {
    let i, j, k, id, name, alt, val, text, type, check, postForm
    const $but     = this;
    const act      = $but.name;
    const func     = $but.func;
    const postFile = $but.id;
    const $box     = $but.parentElement.parentElement;

    i = 0;
    let arrBut = []; /* ══ array of buttons data ══ */ 
    let siblings = getAllSiblings($but);
    siblings.forEach( (item) => {
        ( item.id ) ? id = item.id : id = '';
        ( item.alt ) ? alt = item.alt : alt = '';
        ( item.name ) ? name = item.name : name = '';
        arrBut[i] = {alt, name, id};
        i++;
    });

    let arrElData = []; /* ══ data array js-el-data ══ */ 
    let arrJsElData = $box.querySelectorAll('.js-el-data');
    if ( arrJsElData?.length > 0 ) {
        i = 0;
        arrJsElData.forEach( (item) => {
            let result = getValAndId(item);
            id  = result.id; 
            val = result.val;
            arrElData[i] = {id, val};
            i++;
        });
    }    

    i = 0;
    let arrTlData = []; /* ══ data array js-table-data ══ */ 
    $box.querySelectorAll('.js-table-data').forEach( ($elTbl) => {
        arrTlData[i] = getResultParseTable($elTbl);
        i++;
    });

    let form = $box.querySelector('form');
    ( form ) ? postForm = new FormData(form) : postForm = '';

    let fData = new FormData();
    let loadFile = 0;
    let arrDataFile = $box.querySelectorAll('input[type="file"]');
    arrDataFile.forEach( (inputElem) => {
        if ( inputElem.value ) {
            let urlFile = inputElem.files[0];
            fData.append('image_' + loadFile, urlFile);
            loadFile++;
        }
    });
    ( loadFile > 0 ) ? loadFile = 1 : loadFile = 0;

    const ordata = {arrTlData, arrBut, arrElData, act, postForm, loadFile};
    $.each(ordata, function(key, value){
        createFormData(fData, value, key);
    })
    
    $.ajax({
        url: postFile,
        type: "POST",
        data : fData,
        processData: false,
        contentType: false,
        cache: false,
        success: function(result) {
            (func) ? window[func]() : null;    /* ══ data refresh function ══ */
            setTimeout(function() { alert(result) }, 100);
        }
    })
}
/* ══ SAVE DATA FROM BOX ════════╝  END  ╚═ */

/* ══ UPLOAD THUMB IMAGE IN BOX ════════╗ START ╔═ */
function clickLoad() {
    const name = this.name; 
    const $box = this.parentElement;
    const $img = $box.querySelector('.js-load-file');
    const $title = $box.querySelector('span');
    const $result = $box.querySelector('figure');
    const $iconFile = $box.querySelector('.js-icon-file');

    if (name === 'add') $img.click();
    if ( name === 'del' ) {

        if ( $iconFile ) {
            $iconFile.src = $iconFile.src.replace('on','no');
            $title.innerHTML = 'no file';
            $iconFile.title = 'no file';
        }

        $img.value = '';
        if ( $result ) $result.innerHTML = '';
        ( this.classList.contains('el-hiden') ) ? toggleClass(this, 'el-hiden', null) : toggleClass(this, null, 'el-hiden');
        let anotherButton = getFoundSiblings(this, '.js-ch-thumb');
        anotherButton.forEach( ($el) => ( $el.classList.contains('el-hiden') ) ? toggleClass($el, 'el-hiden', null) : toggleClass($el, null, 'el-hiden') );
    }
}

function uploadImageWithThumb(){
    const $box = this.parentElement.parentElement;
    const $title = $box.querySelector('span');
    const arrBut = $box.querySelectorAll('.js-ch-thumb');
    const $result = $box.querySelector('figure');
    const $iconFile = $box.querySelector('.js-icon-file');

    arrBut.forEach( ($el) => ( $el.classList.contains('el-hiden') ) ? toggleClass($el, 'el-hiden', null) : toggleClass($el, null, 'el-hiden') );

    if ( $iconFile ) {
        $iconFile.src = $iconFile.src.replace('no','on');
        const nameFile = this.files[0].name.toString(); 
        $iconFile.title = 'file loaded';
        $title.innerHTML = nameFile;
    }

    if ( $result ) {
        loadImage(
            this.files[0],
            function (img) {
                $result.appendChild(img)
            },
            { 
                maxWidth: 100,
                maxHeight: 110,
                minWidth: 80,
                minHeight: 100,
                canvas: true
            }
        )
    }
}
/* ══ UPLOAD THUMB IMAGE IN BOX ════════╝  END  ╚═ */

/* ══ PARSE TABLE ════════╗ START ╔═ */
function getResultParseTable(obj) {
    let id, text
    let arrTr = [];

    id   = obj?.id; 
    name = obj?.name; 
    let arrData = {id, name, arrTr}

    let i = 0;
    obj.querySelectorAll('tr').forEach( ($tr) => {
        let j = 0;
        let arrTd = [];

        arrTr[i] = { id, td: arrTd };
        ($tr.id) ? arrTr[i].id = $tr.id : arrTr[i].id = null;

        $tr.querySelectorAll('td').forEach( ($td) => {
            let k = 0;
            let arrEl = [];
            
            arrTd[j] = { id, text, el: arrEl };
            ($td.id) ? arrTd[j].id = $td.id : arrTd[j].id = null;
            ($td.innerText) ? arrTd[j].text = $td.innerText : arrTd[j].text = null;

            $td.querySelectorAll('input, textarea, select').forEach( ($elem) => {
                let id, name, val, type, check
                let result = getValAndId($elem);
                id   = result.id; 
                val  = result.val; 
                type = result.nameTag;
                name = $elem.name;
                ($elem.checked) ? check = 't' : check = 'f';
                arrEl[k] = {id, name, val, type, check};
                k++;

            });
            j++;

        });
        i++;

    });

    return arrData;
}
/* ══ PARSE TABLE ════════╝  END  ╚═ */

/* ══ SEARCH BY TABLE WITHOUT POST REQUEST ════════╗ START ╔═ */
function filterAndHidenTrTable() {
    const str = this.value;
    const index = this.parentNode.cellIndex;
    const tr = this.parentNode.parentNode;
    
    if ( str && str.length >= 2) {
        let nextTr = getFoundSiblings(tr, 'tr');
        nextTr.forEach( (item) => {
            const tdT = item.cells[index];
            const tdText = item.cells[index].innerText;
            ( tdText.search(str) != -1 ) ? toggleClass(item, 'el-hiden', null) :
                toggleClass(item, null, 'el-hiden');
            let regx = new RegExp(str, "g");
            let newstring = tdText.replace(regx, '<span class="highlight">' + str + '</span>')
            tdT.innerHTML = newstring;
        });
    }
    if ( str.length <= 1 ) {
        let nextTr = getFoundSiblings(tr, 'tr');
        nextTr.forEach( (item) => {
            const tdT = item.cells[index];
            const tdText = item.cells[index].innerText;
            tdT.innerHTML = tdText;
            ( tdText.search(str) != -1 ) ? toggleClass(item, 'el-hiden', null) :
                toggleClass(item, null, 'el-hiden');
        });
    }
}
/* ══ SEARCH BY TABLE WITHOUT POST REQUEST ════════╝  END  ╚═ */
