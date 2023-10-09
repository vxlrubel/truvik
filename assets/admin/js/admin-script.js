(function ($) {

    // 'use strict';

    const truvikAssessment = {

        approveLink: $('.assessment-data-approve'),

        processingLing: $('.assessment-data-processing'),

        rejectLink: $('.assessment-data-reject'),

        filterAction: $('#filter-assessment-data-submit'),

        exportButton: $('#filtered-assessment-data-export'),

        init: function () {
            this.approveData();
            this.rejectData();
            this.processingData();
            this.retriveFilteredData();
            this.exportAssessmentData();
            this.dataFilteringByDate();
        },
        approveData: function () {
            this.approveLink.on('click', function (e) {
                e.preventDefault();
                const _self = $(this);
                const parent = _self.parents('td.approve-parent');
                const teargetStaus = parent.siblings('td.target-parent').find('a');
                const args = {
                    action: 'update_assessment_form_data',
                    id: _self.data('assessment'),
                    status: teargetStaus.text()
                }

                if ('processing' == args.status || 'rejected' == args.status) {
                    $.ajax({
                        type: "post",
                        url: truvik.ajaxurl,
                        data: args,
                        success: function (response) {
                            teargetStaus.text(response.data);
                            _self.text(response.data);
                        },
                        beforeSend: function () {
                            _self.text('Loading...');
                        }
                    });
                } else {
                    alert('Already Approved');
                }
            });

        },

        rejectData: function () {
            this.rejectLink.on('click', function (e) {
                e.preventDefault();
                const _self = $(this);
                const parent = _self.parents('td.approve-parent');
                const teargetStaus = parent.siblings('td.target-parent').find('a');
                const args = {
                    action: 'delete_assessment_form_data',
                    id: _self.data('assessment'),
                    status: teargetStaus.text()
                }

                if (args.status === 'rejected') {
                    alert('Already Rejected');
                    return;
                }

                $.ajax({
                    type: 'post',
                    url: truvik.ajaxurl,
                    data: args,
                    success: function (response) {
                        parent.parents('tr').css('backgroundColor', '#d63031').fadeOut(250);
                        console.log(response);
                    },
                    beforeSend: function () {
                        _self.text('Rejecting...')
                    }
                });
            });
        },

        processingData: function () {
            this.processingLing.on('click', function (e) {

                e.preventDefault();
                const _self = $(this);
                const parent = _self.parents('td.approve-parent');
                const teargetStaus = parent.siblings('td.target-parent').find('a');
                const args = {
                    action: 'processing_assessment_data',
                    id: _self.data('assessment'),
                    status: teargetStaus.text()
                }

                if (args.status === 'processing') {
                    alert('Data already in processed.');
                    return;
                }

                $.ajax({
                    type: "post",
                    url: truvik.ajaxurl,
                    data: args,
                    success: function (response) {
                        teargetStaus.text(response.data);
                        _self.text(response.data);
                    },
                    beforeSend: function () {
                        _self.text('Loading...');
                    }
                });

            });
        },

        retriveFilteredData: function () {
            this.filterAction.on('click', function (e) {
                e.preventDefault();
                const _self = $(this);
                const status = _self.siblings('#filter-assessment-data').val();
                const table = $('#stroed-filtered-data');
                const text = _self.val();
                const args = {
                    action: 'assessment_data_filtering',
                    status: status,
                }

                // send ajax requiest
                $.ajax({
                    type: 'post',
                    url: truvik.ajaxurl,
                    data: args,
                    success: function (response) {
                        table.html(response.data);
                        _self.val(text);
                        // approve data from assessment form
                        $('.assessment-data-approve').on('click', function (e) {
                            e.preventDefault();
                            const _self = $(this);
                            const parent = _self.parents('td.approve-parent');
                            const teargetStaus = parent.siblings('td.target-parent').find('a');
                            const args = {
                                action: 'update_assessment_form_data',
                                id: _self.data('assessment'),
                                status: teargetStaus.text()
                            }

                            if ('processing' == args.status || 'rejected' == args.status) {
                                $.ajax({
                                    type: "post",
                                    url: truvik.ajaxurl,
                                    data: args,
                                    success: function (response) {
                                        teargetStaus.text(response.data);
                                        _self.text(response.data);
                                    },
                                    beforeSend: function () {
                                        _self.text('Loading...');
                                    }
                                });
                            } else {
                                alert('Already Approved');
                            }
                        });

                        // reject data from database status
                        $('.assessment-data-reject').on('click', function (e) {
                            e.preventDefault();
                            const _self = $(this);
                            const parent = _self.parents('td.approve-parent');
                            const teargetStaus = parent.siblings('td.target-parent').find('a');
                            const args = {
                                action: 'delete_assessment_form_data',
                                id: _self.data('assessment'),
                                status: teargetStaus.text()
                            }

                            if (args.status === 'rejected') {
                                alert('Already Rejected');
                                return;
                            }

                            $.ajax({
                                type: 'post',
                                url: truvik.ajaxurl,
                                data: args,
                                success: function (response) {
                                    parent.parents('tr').css('backgroundColor', '#d63031').fadeOut(250);
                                    console.log(response);
                                },
                                beforeSend: function () {
                                    _self.text('Rejecting...')
                                }
                            });
                        });

                        $('.assessment-data-processing').on('click', function (e) {

                            e.preventDefault();
                            const _self = $(this);
                            const parent = _self.parents('td.approve-parent');
                            const teargetStaus = parent.siblings('td.target-parent').find('a');
                            const args = {
                                action: 'processing_assessment_data',
                                id: _self.data('assessment'),
                                status: teargetStaus.text()
                            }

                            if (args.status === 'processing') {
                                alert('Data already in processed.');
                                return;
                            }

                            $.ajax({
                                type: "post",
                                url: truvik.ajaxurl,
                                data: args,
                                success: function (response) {
                                    teargetStaus.text(response.data);
                                    _self.text(response.data);
                                },
                                beforeSend: function () {
                                    _self.text('Loading...');
                                }
                            });

                        });

                    },
                    beforeSend: function () {
                        _self.val('loading...');
                    }
                });
            });
        },

        // export assessment data
        exportAssessmentData: function () {
            this.exportButton.on('click', function (e) {
                e.preventDefault();
                const _self = $(this);
                const status = _self.siblings('#filter-assessment-data').val();

                const args = {
                    action: 'export_assessment_data',
                    status: status,
                    security: truvik.ajax_exporter,
                    start_date: $('#truvik-start-date').val(),
                    end_date: $('#truvik-start-end').val()
                }

                $.ajax({
                    type: 'post',
                    url: truvik.ajaxurl,
                    data: args,
                    success: function (response) {
                        var blob = new Blob([response]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'assessment-data.csv';
                        link.click();
                    }
                });

            })
        },

        dataFilteringByDate() {
            $('#filter-assessment-data-by-date').on('click', function (e) {
                e.preventDefault();
                let _self = $(this);
                let startDate = $('#truvik-start-date').val();
                let endDate = $('#truvik-start-end').val();
                let self_text = _self.val();
                let sataSet = {
                    action: 'truvik_filter_by_date',
                    start: startDate,
                    end: endDate
                }

                $.ajax({
                    type: 'POST',
                    url: truvik.ajaxurl,
                    data: sataSet,
                    success: function (response) {
                        $('.truvik-custom-table-list').empty();
                        $('.truvik-custom-table-list').html(response.data);
                        _self.val(self_text);
                    },
                    beforeSend: function () {
                        _self.val('loading...');
                    }
                });
            })
        },

    }
    $(document).ready(function () {
        truvikAssessment.init();
    });
})(jQuery);