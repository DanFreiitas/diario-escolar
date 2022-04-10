// INICIO LISTA PRESEÇA 
$(function () {
    $('#turma').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=addPresenca&turma=' + turma;
    });

    $('#disciplina').change(function () {
        turma = $('#turma').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=addPresenca&turma=' + turma + '&disciplina=' + disciplina;
    });
});

$(function () {
    $('#listarTurma').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=listarPresenca&turma=' + turma;
    });

    $('#listarDisciplina').change(function () {
        turma = $('#listarTurma').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=listarPresenca&turma=' + turma + '&disciplina=' + disciplina;
    });
});
// FINAL LISTA PRESENÇA 


//PÁGINA DE NOTA
$(function () {
    $('#turmaNota').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=addNota&turmaNota=' + turma;
    });

    $('#disciplinaNota').change(function () {
        turma = $('#turmaNota').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=addNota&turmaNota=' + turma + '&disciplinaNota=' + disciplina;

    });

    $('#horarioNota').change(function () {
        turma = $('#turmaNota').val();
        disciplina = $('#disciplinaNota').val();
        horarioNota = $(this).val();
        window.location = 'dashboard.php?pagina=addNota&turmaNota=' + turma + '&disciplinaNota=' + disciplina + '&horarioNota=' + horarioNota;

    });

});
//FIM PÁGINA DE NOTA

//PÁGINA DE CONTEÚDO
$(function () {
    $('#turmaCont').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=addConteudo&turmaCont=' + turma;
    });

    $('#dataCont').change(function () {
        turma = $('#turmaCont').val();
        data = $(this).val();
        window.location = 'dashboard.php?pagina=addConteudo&turmaCont=' + turma + '&dataCont=' + data;

    });

    $('#disciplinaCont').change(function () {
        turma = $('#turmaCont').val();
        data = $('#dataCont').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=addConteudo&turmaCont=' + turma + '&dataCont=' + data + '&disciplinaCont=' + disciplina;

    });

    $('#horarioCont').change(function () {
        turma = $('#turmaCont').val();
        data = $('#dataCont').val();
        disciplina = $('#disciplinaCont').val();
        horario = $(this).val();
        window.location = 'dashboard.php?pagina=addConteudo&turmaCont=' + turma + '&dataCont=' + data + '&disciplinaCont=' + disciplina + '&horarioCont=' + horario;

    });

    $('#bimestreCont').change(function () {
        turma = $('#turmaCont').val();
        data = $('#dataCont').val();
        disciplina = $('#disciplinaCont').val();
        horario = $('#horarioCont').val();
        bimestre = $(this).val();
        window.location = 'dashboard.php?pagina=addConteudo&turmaCont=' + turma + '&dataCont=' + data + '&disciplinaCont=' + disciplina + '&horarioCont=' + horario + '&bimestreCont=' + bimestre;

    });

});
//FIM PÁGINA DE CONTEÚDO
//INICIO PAGINA LISTAR NOTA
$(function () {
    $('#turmaLNota').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=listarNota&turmaLNota=' + turma;
    });

    $('#dataLNota').change(function () {
        turma = $('#turmaLNota').val();
        data = $(this).val();
        window.location = 'dashboard.php?pagina=listarNota&turmaLNota=' + turma + '&dataLNota=' + data;

    });

    $('#disciplinaLNota').change(function () {
        turma = $('#turmaLNota').val();
        data = $('#dataLNota').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=listarNota&turmaLNota=' + turma + '&disciplinaLNota=' + disciplina + '&dataLNota=' + data;

    });
});
//FIM PAGINA LISTAR NOTA

//PAGINA LISTAR CONTEUDO
$(function () {
    $('#turmaLCont').change(function () {
        turma = $(this).val();
        window.location = 'dashboard.php?pagina=listarConteudo&turmaLCont=' + turma;
    });

    $('#dataLCont').change(function () {
        turma = $('#turmaLCont').val();
        data = $(this).val();
        window.location = 'dashboard.php?pagina=listarConteudo&turmaLCont=' + turma + '&dataLCont=' + data;

    });

    $('#disciplinaLCont').change(function () {
        turma = $('#turmaLCont').val();
        data = $('#dataLCont').val();
        disciplina = $(this).val();
        window.location = 'dashboard.php?pagina=listarConteudo&turmaLCont=' + turma + '&dataLCont=' + data + '&disciplinaLCont=' + disciplina;

    });

    $('#horarioLCont').change(function () {
        turma = $('#turmaLCont').val();
        data = $('#dataLCont').val();
        disciplina = $('#disciplinaLCont').val();
        horario = $(this).val();
        window.location = 'dashboard.php?pagina=listarConteudo&turmaLCont=' + turma + '&dataLCont=' + data + '&disciplinaLCont=' + disciplina + '&horarioLCont=' + horario;

    });

    $('#bimestreLCont').change(function () {
        turma = $('#turmaLCont').val();
        data = $('#dataLCont').val();
        disciplina = $('#disciplinaLCont').val();
        horario = $('#horarioLCont').val();
        bimestre = $(this).val();
        window.location = 'dashboard.php?pagina=listarConteudo&turmaLCont=' + turma + '&dataLCont=' + data + '&disciplinaLCont=' + disciplina + '&horarioLCont=' + horario + '&bimestreLCont=' + bimestre;

    });

});
//FIM PAGINA LISTAR CONTEUDO


