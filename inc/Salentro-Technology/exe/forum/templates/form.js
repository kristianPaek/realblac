function insertAtCursor(myField, myValue, bbCode1, bbCode2, endOfLine) {
var bbb;
if (document.selection) {
//IE support
var str = document.selection.createRange().text;
myField.focus();
sel = document.selection.createRange();
sel.text = bbCode1 + myValue + bbCode2 + endOfLine;
if(myValue=='') { bbb=bbCode2.length; sel.moveStart('character',-bbb); sel.moveEnd('character',-bbb); }
sel.select();
return;
}
//MOZILLA/NETSCAPE support
else if (myField.selectionStart || myField.selectionStart == '0') {
var startPos = myField.selectionStart;
var endPos = myField.selectionEnd;
var bbb2, bbV;
if(myValue=='') myValue = myField.value.substring(startPos, endPos);
myField.value = myField.value.substring(0, startPos) + bbCode1 + myValue + bbCode2 + endOfLine + myField.value.substring(endPos, myField.value.length);
if(myValue=='') { bbb=bbCode1.length; myField.selectionStart=startPos+bbb; myField.selectionEnd=endPos+bbb; }
else { bbb=bbCode1.length; bbb2=bbCode2.length; bbV=myValue.length; myField.selectionStart=startPos+bbV+bbb+bbb2; myField.selectionEnd=startPos+bbV+bbb+bbb2; } 
myField.focus();
return;
} else {
myField.value += myValue;
return;
}
}

function paste_strinL(strinL, isQuote, bbCode1, bbCode2, endOfLine){ 
if((isQuote==1 || isQuote==2) && strinL=='') alert(l_quoteMsgAlert);
else{
if (isQuote==1) {
bbCode1='[i]'; bbCode2='[/i]'; endOfLine='\n';
}
if (isQuote==2) {
bbCode1='[b]'; bbCode2='[/b]'; endOfLine='\n';
}
var isForm=document.forms["postMsg"];
if (isForm) {
var input=document.forms["postMsg"].elements["postText"];
insertAtCursor(input, strinL, bbCode1, bbCode2, endOfLine);
}
else alert(l_accessDenied);
}
}

function pasteSel() { 
if(document.getSelection) selection=document.getSelection(); 
else if(document.selection) selection=document.selection.createRange().text; 
else if(window.getSelection) selection=window.getSelection(); 
else selection=''; 
}