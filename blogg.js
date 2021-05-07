

/*fix hover-touch-menu on ipad*/
jQuery(document).ready(function($) {/*touchstart*/
    $('.primary-navigation ul li a').on({ 'touchstart' : function(e) {
        $('.primary-navigation ul li').removeClass("active");
        if ($(this).parent().hasClass("menu-item-has-children")) {
            if (!$(this).parent().hasClass("active")) {
                $(this).parent().addClass("active");
                e.preventDefault();
            }
        }



    } });

});
/* END fix hove-touch-menu on ipad */

/* <![CDATA[ */
var cookie_object = {"cookie_accept_enable":"1","cookie_text":"Vi anv\u00e4nder cookies f\u00f6r statistik och anpassat inneh\u00e5ll.","cookie_button_text":"Jag f\u00f6rst\u00e5r","cookie_link_text":"L\u00e4s mer om cookies","cookie_link":"http:\/\/www.hultsfred.se\/artikel\/cookies\/"};
/* ]]> */


(function(window) {

  if (!!window.cookieChoices) {
    return window.cookieChoices;
  }

  var document = window.document;

  var cookieChoices = (function() {

    var cookieName = 'displayCookieConsent';
    var cookieConsentId = 'cookieChoiceInfo';
    var dismissLinkId = 'cookieChoiceDismiss';

    function _createHeaderElement(cookieText, dismissText, linkText, linkHref) {
      var butterBarStyles = 'width:800px;max-width:80%;background-color:#eee;border:1px solid #3e3e3f; border-radius: 4px; margin:0 auto; padding:20px; text-align:center;';
	  var butterWrapperBarStyles = 'position:fixed;width:100%; margin:0; left:0; bottom:60px; z-index:10001!important;';


	  var cookieConsentElement = document.createElement('div');
      cookieConsentElement.id = cookieConsentId;
      cookieConsentElement.style.cssText = butterBarStyles;
      cookieConsentElement.appendChild(_createConsentText(cookieText));

	  var cookieWrapperConsentElement = document.createElement('div');
      cookieWrapperConsentElement.id = cookieConsentId;
      cookieWrapperConsentElement.style.cssText = butterWrapperBarStyles;
      cookieWrapperConsentElement.appendChild(cookieConsentElement);

      if (!!linkText && !!linkHref) {
        cookieConsentElement.appendChild(_createInformationLink(linkText, linkHref));
      }
      cookieConsentElement.appendChild(_createDismissLink(dismissText));
      return cookieWrapperConsentElement;
    }

    function _createDialogElement(cookieText, dismissText, linkText, linkHref) {
      var glassStyle = 'position:fixed;width:100%;height:100%;z-index:999;' +
          'top:0;left:0;opacity:0.5;filter:alpha(opacity=50);' +
          'background-color:#ccc;';
      var dialogStyle = 'z-index:1000;position:fixed;left:50%;top:50%';
      var contentStyle = 'position:relative;left:-50%;margin-top:-25%;' +
          'background-color:#fff;padding:20px;box-shadow:4px 4px 25px #888;';

      var cookieConsentElement = document.createElement('div');
      cookieConsentElement.id = cookieConsentId;

      var glassPanel = document.createElement('div');
      glassPanel.style.cssText = glassStyle;

      var content = document.createElement('div');
      content.style.cssText = contentStyle;

      var dialog = document.createElement('div');
      dialog.style.cssText = dialogStyle;

      var dismissLink = _createDismissLink(dismissText);
      dismissLink.style.display = 'block';
      dismissLink.style.textAlign = 'right';
      dismissLink.style.marginTop = '8px';

      content.appendChild(_createConsentText(cookieText));
      if (!!linkText && !!linkHref) {
        content.appendChild(_createInformationLink(linkText, linkHref));
      }
      content.appendChild(dismissLink);
      dialog.appendChild(content);
      cookieConsentElement.appendChild(glassPanel);
      cookieConsentElement.appendChild(dialog);
      return cookieConsentElement;
    }

    function _setElementText(element, text) {
      element.textContent = text;
      //element.innerText = text;
    }

    function _createConsentText(cookieText) {
      var consentText = document.createElement('span');
      _setElementText(consentText, cookieText);
      return consentText;
    }

    function _createDismissLink(dismissText) {
      var dismissLink = document.createElement('a');
      _setElementText(dismissLink, dismissText);
      dismissLink.id = dismissLinkId;
      dismissLink.href = '#';
      dismissLink.style.marginLeft = '16px';
      return dismissLink;
    }

    function _createInformationLink(linkText, linkHref) {
      var infoLink = document.createElement('a');
      _setElementText(infoLink, linkText);
      infoLink.href = linkHref;
      infoLink.target = '_top';
      infoLink.style.marginLeft = '16px';
      return infoLink;
    }

    function _dismissLinkClick() {
      _saveUserPreference();
      _removeCookieConsent();
      return false;
    }

    function _showCookieConsent(cookieText, dismissText, linkText, linkHref, isDialog) {
      if (_shouldDisplayConsent()) {
        _removeCookieConsent();
        var consentElement = (isDialog) ?
            _createDialogElement(cookieText, dismissText, linkText, linkHref) :
            _createHeaderElement(cookieText, dismissText, linkText, linkHref);
        var fragment = document.createDocumentFragment();
        fragment.appendChild(consentElement);
        document.body.appendChild(fragment.cloneNode(true));
        document.getElementById(dismissLinkId).onclick = _dismissLinkClick;
      }
    }

    function showCookieConsentBar(cookieText, dismissText, linkText, linkHref) {
      _showCookieConsent(cookieText, dismissText, linkText, linkHref, false);
    }

    function showCookieConsentDialog(cookieText, dismissText, linkText, linkHref) {
      _showCookieConsent(cookieText, dismissText, linkText, linkHref, true);
    }

    function _removeCookieConsent() {
      var cookieChoiceElement = document.getElementById(cookieConsentId);
      if (cookieChoiceElement != null) {
        cookieChoiceElement.parentNode.removeChild(cookieChoiceElement);
      }
    }

    function _saveUserPreference() {
      // Set the cookie expiry to one year after today.
      var expiryDate = new Date();
      expiryDate.setFullYear(expiryDate.getFullYear() + 1);
      document.cookie = cookieName + '=y; expires=' + expiryDate.toGMTString() + '; path=/';
    }

    function _shouldDisplayConsent() {
      // Display the header only if the cookie has not been set.
      return !document.cookie.match(new RegExp(cookieName + '=([^;]+)'));
    }

    var exports = {};
    exports.showCookieConsentBar = showCookieConsentBar;
    exports.showCookieConsentDialog = showCookieConsentDialog;
    return exports;
  })();

  window.cookieChoices = cookieChoices;
  return cookieChoices;
})(this);


document.addEventListener('DOMContentLoaded', function(event) {
	if (cookie_object != null && cookie_object["cookie_accept_enable"] == "1") {
		if (cookie_object["cookie_text"] != "" && cookie_object["cookie_button_text"] != "" && cookie_object["cookie_link_text"] != "" && cookie_object["cookie_link"] != "") {
			cookieChoices.showCookieConsentBar(cookie_object["cookie_text"], cookie_object["cookie_button_text"], cookie_object["cookie_link_text"], cookie_object["cookie_link"]);
		}
	}
});
