
/*�X�N���[���Œ�*/
$(window).load(function() {
	var tab = $('.scrollfix'), //�Œ肵�����v�f��
    offset = tab.offset();

$(window).scroll(function () {
  if($(window).scrollTop() > offset.top-10 ) {
    tab.addClass('fixed');
  } else {
    tab.removeClass('fixed');
  }
});
});