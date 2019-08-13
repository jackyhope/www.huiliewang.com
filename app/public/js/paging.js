(function($, window, document) {
    function Paging(el, options) {
        this.el = el;
        this.options = {
            pageNo: options.initPageNo || 1, // ��ʼҳ��
            totalPages: options.totalPages || 1, //��ҳ��
            totalCount: options.totalCount || '', // ��Ŀ����
            slideSpeed: options.slideSpeed || 0, // �����ٶ�
            jump: options.jump || false, // ֧����ת
            callback: options.callback || function() {} // �ص�����
        };
        this.init();
    }
    // ��ʵ��������ӹ������Ժͷ���
    Paging.prototype = {
        constructor: Paging,
        init: function() {
            this.createDom();
            this.bindEvents();
        },
        createDom: function() {
            var that = this,
                ulDom = '',
                jumpDom = '',
                content = '',
                liWidth = 22, // li�Ŀ��
                totalPages = that.options.totalPages, // ��ҳ��
                wrapLength = 0;
            totalPages > 5 ? wrapLength = 5 * liWidth+8 : wrapLength = totalPages * liWidth+8;
            for (var i = 1; i <= that.options.totalPages; i++) {
                i != 1 ? ulDom += '<li>' + i + '</li>' : ulDom += '<li class="sel-page">' + i + '</li>';
            }
            that.options.jump ? jumpDom = '<input type="text" placeholder="1" class="jump-text jumpText" ><button type="button" class="jump-button" >��ת</button>' : jumpDom = '';
            content = '<div class="pagger-box"><p class="total-count">' +
            that.options.totalCount +
            '</p><button class="turnPage pre-page"><</button>' +
                '<div class="pageWrap" style="width:' + wrapLength + 'px">' +
                '<ul class="pageSelect" style="transition:all ' + that.options.slideSpeed + 'ms">' +
                ulDom +
                '</ul></div>' +
                '<button class="turnPage next-page">></button>'  +
                /*jumpDom  +*/
                '<select class="pagerSel"><option value="5">5��/ҳ</option><option value="10">10��/ҳ</option><option value="15">15��/ҳ</option><option value="20">20��/ҳ</option></select></div>';
            that.el.html(content);
        },
        bindEvents: function() {
        	var that = this;
        	var $el =that.el;
            var pageSelect = $el.find('.pageSelect'), // ul
                lis = pageSelect.children(), // li�ļ���
                liWidth = 29, // li�Ŀ��
                totalPages = that.options.totalPages, // ��ҳ��
                pageIndex = that.options.pageNo, // ��ǰѡ���ҳ��
                distance = 0, // ul�ƶ�����
                prePage = $el.find('.pre-page'),
                nextPage = $el.find('.next-page'),
                firstPage = $el.find('.first-page'),
                lastPage = $el.find('.last-page'),
                jumpBtn = $el.find('.jump-button'),
                jumpText = $el.find('.jump-text');
            prePage.on('click', function() {
                pageIndex--;
                if (pageIndex < 1) pageIndex = 1;
                handles(pageIndex,$('.pagerSel').val()-0);
            })
            jumpText.on("keyup",function(event){
			  if(event.keyCode ==13){
				  jumpBtn.trigger("click");
			  }
            });
            $('.pagerSel').change(ev=>{
                handles(pageIndex,$('.pagerSel').val()-0);
            })
            nextPage.on('click', function() {
                pageIndex++;
                if (pageIndex > lis.length) pageIndex = lis.length;
                handles(pageIndex,$('.pagerSel').val()-0);
            })

            firstPage.on('click', function() {
                pageIndex = 1;
                handles(pageIndex,$('.pagerSel').val()-0);
            })

            lastPage.on('click', function() {
                pageIndex = totalPages;
                handles(pageIndex,$('.pagerSel').val()-0);
            })

            jumpBtn.on('click', function() {
                var jumpNum = parseInt(jumpText.val().replace(/\D/g, ''));
                if (jumpNum && jumpNum >= 1 && jumpNum <= totalPages) {
                    pageIndex = jumpNum;
                    handles(pageIndex,$('.pagerSel').val()-0);
                    jumpText.val(jumpNum);
                }else{
                	jumpText.val(totalPages);
                	jumpBtn.trigger("click");
                }
            })

            lis.on('click', function() {
                pageIndex = $(this).index() + 1;
                handles(pageIndex,$('.pagerSel').val()-0);
            })

            function handles(pageIndex) {
            	jumpText.val(pageIndex);
                lis.removeClass('sel-page').eq(pageIndex - 1).addClass('sel-page');
                if (totalPages <= 5) {
                    that.options.callback(pageIndex,$('.pagerSel').val()-0);
                    return false;
                }
                if (pageIndex >= 3 && pageIndex <= totalPages - 2) distance = (pageIndex - 3) * liWidth;
                if (pageIndex == 2 || pageIndex == 1) distance = 0;
                if (pageIndex > totalPages - 2) distance = (totalPages - 5) * liWidth;
                pageSelect.css('transform', 'translateX(' + (-distance) + 'px)');
                pageIndex == 1 ? firstPage.attr('disabled', true) : firstPage.attr('disabled', false);
                pageIndex == 1 ? prePage.attr('disabled', true) : prePage.attr('disabled', false);
                pageIndex == totalPages ? lastPage.attr('disabled', true) : lastPage.attr('disabled', false);
                pageIndex == totalPages ? nextPage.attr('disabled', true) : nextPage.attr('disabled', false);
                that.options.callback(pageIndex,$('.pagerSel').val()-0);
            }

            handles(that.options.pageNo); // ��ʼ��ҳ��λ��
        }
    }
    $.fn.paging = function(options) {
        return new Paging($(this), options);
    }
})(jQuery, window, document);