function checkAll() {
    if (!checkUserId(signup_form.uid.value)) {
        return false;
    }else if (!checkPassword(signup_form.uid.value, signup_form.upw.value,
        signup_form.upw2.value)) {
        return false;
    } 
    else if (!checkGrade(signup_form.grade.value)) {
        return false;
    } else if (!checkClassroom(signup_form.classroom.value)) {
        return false;
    } 
     else if (!checkNum(signup_form.num.value)) {
        return false;
    } else if(!checkHome()){
        return false;
    } 
    
    return true;
}

function checkExistData(value, dataName) { //공백 검사
    if (value == "") {
        alert(dataName + " 입력해주세요!");
        return false;
    }
    return true;
}

function checkUserId(id){
    //Id가 입력되었는지 확인하기
    if (!checkExistData(id, "아이디를")) return false;

    var idRegExp = /^[a-zA-z0-9]{4,12}$/; //아이디 유효성 검사
    if (!idRegExp.test(id)) {
        alert("아이디는 영문 대소문자와 숫자 4~12자리로 입력해야합니다!");
        signup_form.uid.value = "";
        signup_form.uid.focus();
        return false;
    }
    return true; //확인이 완료되었을 때
}

function checkPassword(id, password1, password2) {
    //비밀번호가 입력되었는지 확인하기
    if (!checkExistData(password1, "비밀번호를"))
        return false;
    //비밀번호 확인이 입력되었는지 확인하기
    if (!checkExistData(password2, "비밀번호 확인을"))
        return false;

    var password1RegExp = /^[a-zA-z0-9]{4,12}$/; //비밀번호 유효성 검사
    if (!password1RegExp.test(password1)) {
        alert("비밀번호는 영문 대소문자와 숫자 4~12자리로 입력해야합니다!");
        signup_form.upw.value = "";
        signup_form.upw.focus();
        return false;
    }
    //비밀번호와 비밀번호 확인이 맞지 않다면..
    if (password1 != password2) {
        alert("비밀번호가 일치하지 않습니다.");
        signup_form.upw.value = "";
        signup_form.upw2.value = "";
        signup_form.upw2.focus();
        return false;
    }

    //아이디와 비밀번호가 같을 때..
    if (id == password1) {
        alert("아이디와 비밀번호는 같을 수 없습니다!");
        signup_form.upw.value = "";
        signup_form.upw2.value = "";
        signup_form.upw2.focus();
        return false;
    }
    return true; //확인이 완료되었을 때
}    

function checkGrade(grade){
    if (!checkExistData(grade, "학년을"))
        return false;
    return true;
}
function checkClassroom(room){
    if (!checkExistData(room, "반을")){
        return false;
    }
    return true;
}
function checkNum(num){
    if (!checkExistData(num, "번호를"))
        return false;
    if (!isNumeric(num)) {
        alert("번호는 숫자로만 입력하세요.");
        document.signup_form.num = ""
        document.signup_form.num.focus()
        return false;
    }
    return true;
}
function isNumeric(s) { 
    for (i=0; i<s.length; i++) { 
      c = s.substr(i, 1); 
      if (c < "0" || c > "9") return false; 
    } 
    return true; 
  }
function checkHome(){
    if(document.getElementById("realhome").checked != true && document.getElementById("dor").checked != true){
        alert("기숙사 여부를 선택해주세요.");
        return false;
    }
    return true;
}
