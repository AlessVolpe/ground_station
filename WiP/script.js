function saveUserInfo(ui) {
  localStorage.setItem("userinfo", JSON.stringify(userInfo));
}

function getUserInfo() {
  return JSON.parse(localStorage.getItem("userinfo") || "{}");
}

function setClassFromObjectProperties(obj, bStorePropAndValue) {
  for (prop in obj) {
    // Find elements which have "data-propname" set. If prop name for instance is "city"
    // These elements will be hit: [span data-city="attribut target || 'empty'" /]
    // The "attribut target" will be set to the value of the object property.
    // If you want city to goto "title" use: data-target="title".
    // Leave empty (blank) to set Element innerText
    var sAttributeName = "data-" + prop;
    var sAttributeNameIf = "data-if-" + prop;
    var valueOfProp = obj[prop];
    var elements = Array.from(
      document.querySelectorAll("[" + sAttributeName + "]")
    );
    if (elements.length === 0) {
      console.log(sAttributeName+' is not used');
    } else {
      elements.map(function(element, i) {
        var attributeTarget = element.getAttribute(sAttributeName);
        if (attributeTarget !== "") {
          // If the user want the value to be set to a given attribute
          // we will set that attribute to the value
          element.setAttribute(attributeTarget, valueOfProp);
        } else {
          element.innerText = valueOfProp;
          if (bStorePropAndValue || false) {
            element.setAttribute("data-prop", prop);
            element.setAttribute("data-val", valueOfProp);
          }
        }
        var showIf = element.getAttribute(sAttributeNameIf)
        if (showIf) {
          try {
            let value = valueOfProp;
            element.style.display = (eval(showIf)) ? 'block' : 'none';
            console.log(element.style.display)
          } catch(e) {
            console.log('Could not eval "'+sAttributeNameIf+'"');
          }
        }
      });
    }
  }
}

function doRequest(url, cb) {
  var oReq = new XMLHttpRequest();
  oReq.onload = cb;
  oReq.open("get", url, true);
  oReq.send();
}

function reqListener() {
  userInfo = {
    time: new Date(),
    userinfo: JSON.parse(this.responseText)
  };
  saveUserInfo(userInfo);
  setClassFromObjectProperties(userInfo.userinfo, bStorePropAndValue);
  showMore();
}

function showMore() {
  var more = {
    time: new Date(userInfo.time).toUTCString(),
    welcome: bReturning ? "Welcome back!" : "First time here?"
  };
  setClassFromObjectProperties(more);
}

var userInfo = getUserInfo(),
  ipinfo = "https://ipinfo.io/json",
  bStorePropAndValue = true,
  bReturning = true;

if (!!!("time" in userInfo)) {
  // New visitor
  bReturning = false;
  doRequest(ipinfo, reqListener);
} else {
  // Returning visitor
  setClassFromObjectProperties(userInfo.userinfo, bStorePropAndValue);
  showMore();
}