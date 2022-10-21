

function getConnectionsInCommon(requestId, page = 1) {
  var functionsOnSuccess = [
    [onSuccessConnectionsInCommon, [requestId, 'response']]
  ];
  ajax('/connection-in-common/' + requestId + '?commonPage=' + page, 'GET', functionsOnSuccess);
}

function onSuccessConnectionsInCommon(id, response) {
  showContent('content_' + id, response);
  hideConnectionInCommonSkeleton(id)
}

function getConnections(page = 1) {
  var functionsOnSuccess = [
    [showContent, ['connection-content', 'response']]
  ];
  ajax('/connection?page=' + page, 'GET', functionsOnSuccess);
}

function getSent(page = 1) {
  var functionsOnSuccess = [
    [showContent, ['sent-content', 'response']]
  ];
  ajax('/sent?page=' + page, 'GET', functionsOnSuccess);
}


function getReceived(page = 1) {
  var functionsOnSuccess = [
    [showContent, ['received-content', 'response']]
  ];
  ajax('/received?page=' + page, 'GET', functionsOnSuccess);
}

//get suggestion
function getSuggestions(page = 1) {
  var functionsOnSuccess = [
    [showContent, ['suggestion-content', 'response']]
  ];
  ajax('/suggestion?page=' + page, 'GET', functionsOnSuccess);
}

function acceptRequest(requestId) {
  var functionsOnSuccess = [
    [onAcceptSuccess, ['response']]
  ];

  ajax('/received/approve/' + requestId, 'GET', functionsOnSuccess);
}

function onAcceptSuccess(response) {
  getReceived()
}

function connectRequest(userId, requestId) {
  var form = ajaxForm([
    ['followeeId', userId],
    ['followerId', requestId],
  ]);

  var functionsOnSuccess = [
    [onConnectSuccess, ['response']]
  ];

  ajax('/connection', 'POST', functionsOnSuccess, form);
}

function onConnectSuccess(response) {
  getSuggestions()
}

function deleteRequest(requestId) {
  var functionsOnSuccess = [
    [onDeleteSuccess, ['response']]
  ];
  ajax('/connection/' + requestId, 'DELETE', functionsOnSuccess);
}

function onDeleteSuccess(response) {
  getConnections();
}
function withdrawRequest(requestId) {
  var functionsOnSuccess = [
    [onWindowSuccess, ['response']]
  ];
  ajax('/connection/' + requestId, 'DELETE', functionsOnSuccess);
}
function onWindowSuccess(response) {
  getSent()
}

$(function () {
  showSkeleton()
  getSuggestions();
});

$('input[type=radio][name=btnradio]').change(function () {
  //here i  get the clicked id of the radio  
  hideContent()
  showSkeleton()
  switch ($(this).attr('id')) {
    case 'connection':
      getConnections()
      break;
    case 'suggestion':
      getSuggestions()
      break;
    case 'sent':
      getSent()
      break;
    case 'received':
      getReceived()
      break;
  }
});

function showSkeleton() {
  $('#skeleton').removeClass('d-none');

}
function hideSkeleton() {
  $('#skeleton').addClass('d-none');

}
function hideConnectionInCommonSkeleton(id) {
  $('#connections_in_common_skeletons_' + id).addClass('d-none');
}

function hideContent() {
  $("#sent-content").addClass('d-none');
  $("#received-content").addClass('d-none');
  $("#suggestion-content").addClass('d-none');
  $("#connection-content").addClass('d-none');
}
function showContent(id, response) {
  hideSkeleton();
  $('#' + id).removeClass('d-none');
  $('#' + id).html(response['content']);

}