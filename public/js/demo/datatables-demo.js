// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableWisata').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori Wisata</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableEvent').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// pemda app
// rpjmd 1621
$(document).ready(function () {
  $('#dataTableRpjmd1621').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Jenis Indikator</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// rpjmd 2126
$(document).ready(function () {
  $('#dataTableRpjmd2126').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        var select = $('<select><option value="">Jenis Indikator</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});


// table  iku dan ikd 1621
$(document).ready(function () {
  $('#dataTableIkudanikd1621').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Jenis Indikator</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// table iku dan ikd 2126
$(document).ready(function () {
  $('#dataTableIkudanikd2126').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Jenis Indikator</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// renstra1621
$(document).ready(function () {
  $('#dataTableRenstra1621').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// resntra 2126

$(document).ready(function () {
  $('#dataTableRenstra2126').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// RKPD 21

$(document).ready(function () {
  $('#dataTableRkpd21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});


// master data
// satuan
$(document).ready(function () {
  $('#dataTableSatuan').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// Misi 1621
$(document).ready(function () {
  $('#dataTableMisi').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// Misi
$(document).ready(function () {
  $('#dataTableMisi2126').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// kode rkening
$(document).ready(function () {
  $('#dataTableKodeRekening').DataTable({
    initComplete: function () {
      this.api().columns([3]).every(function () {
        var column = this;
        var select = $('<select><option value="">Kategori</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// kolaboratif
// sanitasi 2021
$(document).ready(function () {
  $('#dataTableSanitasi21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// sbs21
$(document).ready(function () {
  $('#dataTableSbs21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// persamaphan 21
$(document).ready(function () {
  $('#dataTablePersampahan21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// kumuh 21
$(document).ready(function () {
  $('#dataTableKumuh21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// TNIMD 21
$(document).ready(function () {
  $('#dataTableTnimd21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// Rumah 21
$(document).ready(function () {
  $('#dataTableRumah21').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// sanitasi 22
$(document).ready(function () {
  $('#dataTableSanitasi22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// sbs22
$(document).ready(function () {
  $('#dataTableSbs22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// persamaphan 22
$(document).ready(function () {
  $('#dataTablePersampahan22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// kumuh 22
$(document).ready(function () {
  $('#dataTableKumuh22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
// TNIMD 22
$(document).ready(function () {
  $('#dataTableTnimd22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

// Rumah 22
$(document).ready(function () {
  $('#dataTableRumah22').DataTable({
    initComplete: function () {
      this.api().columns([1]).every(function () {
        var column = this;
        var select = $('<select><option value="">Perangkat Daerah</option></select>')
          .appendTo($(column.header()).empty())
          .on('change', function () {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());

            column.search(val ? '^' + val + '$' : '', true, false).draw();
          });

        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

//gallery
$(document).ready(function () {
  $('#dataTableGaleri').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});
//publikasi
$(document).ready(function () {
  $('#dataTablePublikasi').DataTable({
    initComplete: function () {
      this.api().columns([2]).every(function () {
        var column = this;
        column
          .data()
          .unique()
          .sort()
          .each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
          });
      });
    },
  });
});

