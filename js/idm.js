require(['idm'], function(idm) {
    idm.setLoginURL(drupalSettings.path.baseUrl + 'user/login?destination=' + drupalSettings.path.currentPath);
    idm.setLogoutURL(drupalSettings.path.baseUrl + 'user/logout');
});
