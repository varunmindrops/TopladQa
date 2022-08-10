//Manage Session storage
function setSessionData(key, value) {
    var sessionDataObj = getSessionData();
    //console.log(localDataObj);
    if (!sessionDataObj) {
        sessionDataObj = {};
    }

    sessionDataObj[key] = value;
    sessionStorage.setItem('sessionData', JSON.stringify(sessionDataObj));
}

function getSessionData() {
    return $.parseJSON(sessionStorage.getItem('sessionData'));

}

function getSessionByKey(key) {
    var sessionDataObj = getSessionData();
    if (sessionDataObj && sessionDataObj.hasOwnProperty(key)) {
        return sessionDataObj[key];
    } else {
        return 0;
    }
}

function removeSessionData() {
    sessionStorage.removeItem('sessionData');
}

function getToken() {
    var sessionDataObj = getSessionData();
    if (sessionDataObj && sessionDataObj.hasOwnProperty('token')) {
        return sessionDataObj.token;
    } else {
        return null;
    }
}

function logout() {
    sessionStorage.clear();
    window.location.href = "../admin/index.php";
}
