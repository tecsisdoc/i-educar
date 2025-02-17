<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddCollegeEducacenso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            INSERT INTO modules.educacenso_ies (ies_id, nome, tipo_instituicao_id, dependencia_administrativa_id, user_id, created_at) VALUES
            (6182,\'FACULDADE DE EDUCACAO TECNOLOGICA DO ESTADO DO RIO DE JANEIRO FAETERJ\',2,4,1,now()),
            (11697,\'FACULDADE SERIGY\',2,4,1,now()),
            (12533,\'FACULDADE DOM BOSCO DE CAPITAO LEONIDAS MARQUES\',1,4,1,now()),
            (12718,\'FACULDADE PROMINAS\',1,4,1,now()),
            (12817,\'FACULDADE IMESP MONITOR\',1,4,1,now()),
            (13630,\'ESCOLA SUPERIOR DO MINISTERIO PUBLICO DA UNIAO\',2,1,1,now()),
            (14154,\'FACULDADE PRESIDENTE ANTONIO CARLOS DE RAPOSOS\',2,4,1,now()),
            (14167,\'FACULDADE PRESIDENTE ANTONIO CARLOS DE LAJINHA\',2,4,1,now()),
            (14178,\'FACULDADE PRESIDENTE ANTONIO CARLOS DE ITAOBIM\',2,4,1,now()),
            (14303,\'FACULDADE PADRAO DE SENADOR CANEDO\',1,4,1,now()),
            (15705,\'ESCOLA DE ADMINISTRACAO FAZENDARIA\',2,1,1,now()),
            (16010,\'FACULDADE DE ENSINO SUPERIOR DE LINHARES\',1,3,1,now()),
            (16556,\'FACULDADE ALFA DE CAPELINHA\',1,4,1,now()),
            (16654,\'FACULDADE UNIRB SERRINHA\',1,4,1,now()),
            (16725,\'FACULDADE DE EDUCACAO E TECNOLOGIA DO PARA\',1,4,1,now()),
            (16964,\'FACULDADE DE TECNOLOGIA DE HORIZONTE\',1,4,1,now()),
            (17161,\'CENTRO DE FORMACAO TREINAMENTO E APERFEICOAMENTO\',1,1,1,now()),
            (17612,\'DIRETORIA DE FORMACAO E DESENVOLVIMENTO PROFISSIONAL\',1,1,1,now()),
            (17614,\'ESCOLA DA ADVOCACIA GERAL DA UNIAO\',2,1,1,now()),
            (17615,\'INSTITUTO SERZEDELLO CORREA\',1,1,1,now()),
            (17616,\'ESCOLA DE INTELIGENCIA ESINT/ABIN\',1,1,1,now()),
            (17617,\'ESCOLA NACIONAL DE ADMINISTRACAO PUBLICA\',2,1,1,now()),
            (17651,\'FACULDADE JK GOIAS PADRE BERNARDO\',1,4,1,now()),
            (17830,\'FACULDADE CATOLICA DE ABAETETUBA\',1,4,1,now()),
            (17969,\'ACADEMIA JUDICIAL DO TRIBUNAL DE JUSTICA DE SANTA CATARINA\',1,2,1,now()),
            (17985,\'FACULDADE PRESBITERIANA QUINZE DE NOVEMBRO\',1,4,1,now()),
            (18106,\'FACULDADE COELHO NETO\',1,4,1,now()),
            (18117,\'FACULDADE ESTACIO DE MARINGA\',1,4,1,now()),
            (18135,\'FACULDADE ESTACIO DE PERNAMBUCO ESTACIO PERNAMBUCO\',1,4,1,now()),
            (18152,\'FACULDADE INTEGRADA DE ARAPONGAS\',1,4,1,now()),
            (18153,\'FACULDADE CESUMAR DE GUARAPUAVA\',1,4,1,now()),
            (18158,\'FACULDADE MADALENA SOFIA\',1,4,1,now()),
            (18304,\'FACULDADE TEOLOGICA SAO PAULO\',1,4,1,now()),
            (18462,\'FACULDADE PROMOVE DE CURVELO\',1,4,1,now()),
            (18620,\'FACULDADE DA CONSTRUCAO E DO TRABALHO\',1,4,1,now()),
            (18729,\'FACULDADE LATINO AMERICANO DE EDUCACAO\',1,4,1,now()),
            (18736,\'ESCOLA SUPERIOR DE TECNOLOGIA & GESTAO DE SANTA CATARINA\',1,4,1,now()),
            (18814,\'FACULDADE IBIAPABA\',1,4,1,now()),
            (18826,\'FACULDADE FILOS\',1,4,1,now()),
            (19210,\'FACULDADES INTEGRADAS DE TAGUAI\',1,4,1,now()),
            (19215,\'ESCOLA DE CONTAS E CAPACITACAO PROFESSOR PEDRO ALEIXO\',1,2,1,now()),
            (19256,\'FACULDADE PITAGORAS DE BRUMADO\',1,4,1,now()),
            (19266,\'FACULDADE PITAGORAS DE SETE LAGOAS\',1,4,1,now()),
            (19272,\'FACULDADE PITAGORAS DE CAMPINA GRANDE\',1,4,1,now()),
            (19277,\'FACULDADE CAMPOS BELOS\',1,4,1,now()),
            (19283,\'FACULDADE PITAGORAS DE JACOBINA\',1,4,1,now()),
            (19321,\'FACULDADES VALE DO PIANCO\',1,4,1,now()),
            (19324,\'FACULDADE DE TECNOLOGIA SENAI DOURADOS\',1,4,1,now()),
            (19343,\'FACULDADE MAURICIO DE NASSAU DE ITABUNA\',1,4,1,now()),
            (19348,\'FACULDADE DE TECNOLOGIA ICONE\',1,4,1,now()),
            (19349,\'FACULDADE DO INSTITUTO PANAMERICANO\',1,4,1,now()),
            (19371,\'FACULDADE ADELINA MOURA FAADEMA\',1,4,1,now()),
            (19405,\'FACULDADES INTEGRADAS CESUMAR DE LONDRINA\',1,4,1,now()),
            (19475,\'FACULDADE DOCKTOR\',1,4,1,now()),
            (19517,\'FACULDADE DO CENTRO EDUCACIONAL SANTA ISABEL\',1,4,1,now()),
            (19554,\'INSTITUTO EDUCACIONAL SUPERIOR E PROFISSIONAL\',1,4,1,now()),
            (19635,\'FACULDADE DE ENSINO SUPERIOR PELEGRINO CIPRIANI\',1,4,1,now()),
            (19727,\'FACULDADE REPUBLICANA BRASILEIRA\',1,4,1,now()),
            (19736,\'FACULDADE RENOVACAO DE ARAPONGAS\',1,4,1,now()),
            (19780,\'FACULDADE PITAGORAS DE GUANAMBI\',1,4,1,now()),
            (19785,\'FACULDADE PITAGORAS DE RIBEIRAO DAS NEVES\',1,4,1,now()),
            (19788,\'FACULDADE PITAGORAS DE PARAUAPEBAS\',1,4,1,now()),
            (19791,\'FACULDADE PITAGORAS DE JABOATAO DOS GUARARAPES\',1,4,1,now()),
            (19816,\'FACULDADES IMPACTOS BRASIL\',1,4,1,now()),
            (19823,\'FACULDADE PORTO UNIAO\',1,4,1,now()),
            (19838,\'FACULDADE LUSITANA DE PERNAMBUCO\',1,4,1,now()),
            (19842,\'CENTRO DE ENSINO SUPERIOR DE BACABEIRA\',1,4,1,now()),
            (19848,\'FACULDADE MAURICIO DE NASSAU DE JUIZ DE FORA\',1,4,1,now()),
            (19850,\'FACULDADE MAURICIO DE NASSAU DE NITEROI\',1,4,1,now()),
            (19851,\'FACULDADE MAURICIO DE NASSAU DE SAO JOSE DOS CAMPOS\',1,4,1,now()),
            (19909,\'ICTQ/PGE\',1,4,1,now()),
            (19913,\'FACULDADE ESTACIO DE JATAI ESTACIO JATAI\',1,4,1,now()),
            (20096,\'FACULDADE INPG DE BLUMENAU\',1,4,1,now()),
            (20342,\'FUNDACAO OSWALDO CRUZ\',1,1,1,now()),
            (20481,\'FACULDADE DE BRAGANCA\',1,4,1,now()),
            (20497,\'FACULDADE ROBERTO MIRANDA\',1,4,1,now()),
            (20532,\'FACULDADE METROPOLITANA DE HORIZONTE\',1,4,1,now()),
            (20537,\'FACULDADE BAIANA DO SENHOR DO BONFIM\',1,4,1,now()),
            (20548,\'FACULDADE UNINTA TIANGUA\',1,4,1,now()),
            (20563,\'FACULDADES JOAO PAULO II RIO GRANDE\',1,4,1,now()),
            (20574,\'FACULDADE ANHANGUERA DE NOVA IGUACU\',1,4,1,now()),
            (20586,\'FACULDADE VAN GOGH\',1,4,1,now()),
            (20587,\'FACULDADE PITAGORAS DE IRECE\',1,4,1,now()),
            (20588,\'FACULDADE ANHANGUERA DE URUGUAIANA\',1,4,1,now()),
            (20591,\'FACULDADE POUSO ALEGRE\',1,4,1,now()),
            (20612,\'FACULDADE MAURICIO DE NASSAU DE BELO HORIZONTE\',1,4,1,now()),
            (20615,\'FACULDADE DO SERTAO CENTRAL\',1,4,1,now()),
            (20622,\'FACULDADE UNIRB CAMACARI\',1,4,1,now()),
            (20666,\'FACULDADE ELO\',1,4,1,now()),
            (20682,\'FACULDADE IDOR DE CIENCIAS MEDICAS\',1,4,1,now()),
            (20685,\'FACULDADE HOSPITAL SAO PAULO DE MURIAE\',1,4,1,now()),
            (20700,\'FACULDADE DE DESENVOLVIMENTO DO NORTE\',1,4,1,now()),
            (20975,\'FACULDADE NOVO HORIZONTE\',1,4,1,now()),
            (21088,\'FACULDADE RODOLFO TEOFILO\',1,4,1,now()),
            (21103,\'FIEP FACULDADE INTERNACIONAL DE EVOLUCAO PROFISSIONAL\',1,4,1,now()),
            (21108,\'FACULDADE SAO JUDAS DE TERRA BOA\',1,4,1,now()),
            (21165,\'FACULDADE EASE BRASIL\',1,4,1,now()),
            (21201,\'FTRB FACULDADE TEOLOGICA REFORMADA DE BRASILIA\',1,4,1,now()),
            (21224,\'FACULDADE INTERNACIONAL CIDADE VIVA\',1,4,1,now()),
            (21226,\'FACULDADE SUDOESTE\',1,4,1,now()),
            (21238,\'FACULDADE ANHANGUERA DE SAO JOSE DO RIO PRETO\',1,4,1,now()),
            (21239,\'FACULDADE ANHANGUERA DE JAU\',1,4,1,now()),
            (21261,\'FACULDADE CEDIN\',1,4,1,now()),
            (21266,\'FACULDADE ESTACIO DE PASSOS\',1,4,1,now()),
            (21268,\'FACULDADE ESTACIO DE ANANINDEUA\',1,4,1,now()),
            (21275,\'FACULDADE ANHANGUERA DE ERECHIM\',1,4,1,now()),
            (21280,\'FACULDADE PITAGORAS DE ALAGOINHAS\',1,4,1,now()),
            (21281,\'FACULDADE PITAGORAS DE LUZIANIA\',1,4,1,now()),
            (21310,\'FACULDADE FARUS\',1,4,1,now()),
            (21321,\'FACULDADE SENSU\',1,4,1,now()),
            (21355,\'FACULDADES DE INOVACAO E TECNOLOGIA DE MINAS GERAIS\',1,4,1,now()),
            (21362,\'FACULDADE CENTRO OESTE CATANDUVAS\',1,4,1,now()),
            (21365,\'FACULDADE MAURICIO DE NASSAU DE FLORIANOPOLIS\',1,4,1,now()),
            (21367,\'FACULDADE MAURICIO DE NASSAU DE CAMPINAS\',1,4,1,now()),
            (21368,\'FACULDADE MAURICIO DE NASSAU SAO BERNARDO DO CAMPO\',1,4,1,now()),
            (21370,\'FACULDADE MAURICIO DE NASSAU DE DUQUE DE CAXIAS\',1,4,1,now()),
            (21371,\'FACULDADE UNIVERITAS UNIVERSUS VERITAS DE JOINVILLE\',1,4,1,now()),
            (21398,\'FACULDADE MAURICIO DE NASSAU DE IMPETRATRIZ\',1,4,1,now()),
            (21399,\'FACULDADE UNINASSAU PATOS\',1,4,1,now()),
            (21408,\'FACULDADE INTEGRADA DE PALMEIRAS DE GOIAS\',1,4,1,now()),
            (21412,\'INSTITUTO DE APRENDIZAGEM ATIVA ATIV\',1,4,1,now()),
            (21431,\'FACULDADE IBECO\',1,4,1,now()),
            (21433,\'FACULDADE DINAMO EDUCACAO\',1,4,1,now()),
            (21438,\'FACULDADE WYDEN SAO PAULO\',1,4,1,now()),
            (21444,\'FACULDADE AGAPE DE SAO FELIX\',1,4,1,now()),
            (21445,\'FACULDADE REGIONAL DO CENTRO SUL DE SERGIPE\',1,4,1,now()),
            (21459,\'FACULDADE DOM BOSCO DE MARINGA\',1,4,1,now()),
            (21463,\'FACULDADE DE ENSINO PORTAL\',1,4,1,now()),
            (21485,\'FACULDADE DE ENSINO PASCHOAL DANTAS\',1,4,1,now()),
            (21487,\'FACULDADE DE INOVACAO TECNOLOGICA DE CAMPO GRANDE\',1,4,1,now()),
            (21494,\'FACULDADES INTEGRADAS DE PATOS\',1,4,1,now()),
            (21502,\'FACULDADES INTEGRADAS POTENCIAL\',1,4,1,now()),
            (21503,\'COLEGIO PEDRO II\',1,1,1,now()),
            (21505,\'FACULDADE PRISMA DE APUCARANA\',1,4,1,now()),
            (21514,\'FACULDADE DO SERTAO DO SAO FRANCISCO\',1,4,1,now()),
            (21519,\'FACULDADE MERIDIONAL DE PORTO ALEGRE\',1,4,1,now()),
            (21537,\'FACULDADE DE SANTO ANGELO\',1,4,1,now()),
            (21552,\'FACULDADE PITAGORAS DE RIO BRANCO\',1,4,1,now()),
            (21553,\'FACULDADE PITAGORAS DE SANTO ANTONIO DE JESUS\',1,4,1,now()),
            (21554,\'FACULDADE ANHANGUERA DE ITAPEVA\',1,4,1,now()),
            (21556,\'FACULDADE DE GOIANA\',1,4,1,now()),
            (21557,\'FACULDADE DOS PALMARES\',1,4,1,now()),
            (21573,\'FACULDADE ANA CAROLINA PUGA\',1,4,1,now()),
            (21574,\'FACULDADE EGAS MONIZ\',1,4,1,now()),
            (21577,\'FACULDADE FOCUS\',1,4,1,now()),
            (21586,\'FACULDADE MAURICIO DE NASSAU DE BETIM\',1,4,1,now()),
            (21587,\'FACULDADE MAURICIO DE NASSAU DE UBERLANDIA\',1,4,1,now()),
            (21589,\'FACULDADE MAURICIO DE NASSAU DE CAXIAS DO SUL\',1,4,1,now()),
            (21590,\'FACULDADE MAURICIO DE NASSAU DE LONDRINA\',1,4,1,now()),
            (21592,\'FACULDADE AMAZONAS\',1,4,1,now()),
            (21614,\'FACULDADE POLITECNICA DE LONDRINA\',1,4,1,now()),
            (21616,\'FACULDADE ATUALIZA\',1,4,1,now()),
            (21631,\'FACULDADE SUPREMO REDENTOR\',1,4,1,now()),
            (21654,\'FACULDADE DE ENGENHARIA E AGRIMENSURA DE SAO PAULO\',1,4,1,now()),
            (21669,\'FACULDADE KENNEDY DE IPATINGA\',1,4,1,now()),
            (21670,\'FACULDADE PROMOVE DE SAO PAULO\',1,4,1,now()),
            (21672,\'FACULDADE CERRADO\',1,4,1,now()),
            (21674,\'FACULDADE PROMOVE DE ALFENAS\',1,4,1,now()),
            (21680,\'FACULDADE CEAFI\',1,4,1,now()),
            (21685,\'FACULDADE GIL GAL\',1,4,1,now()),
            (21687,\'FACULDADE PITAGORAS ITABIRA\',1,4,1,now()),
            (21691,\'FACULDADE PITAGORAS BELO JARDIM\',1,4,1,now()),
            (21693,\'FACULDADE ANHANGUERA FRANCA\',1,4,1,now()),
            (21716,\'FACULDADE CESMA DE MARACANAU\',1,4,1,now()),
            (21722,\'FORMACAO FACULDADE INTEGRADA\',1,4,1,now()),
            (21757,\'FACULDADE SUL MINEIRA\',1,4,1,now()),
            (21764,\'FACULDADE DE CIENCIAS DA SAUDE IGESP\',1,4,1,now()),
            (21788,\'INSTITUTO DE DESENVOLVIMENTO EDUCACIONAL\',1,4,1,now()),
            (21808,\'FACULDADES METROPOLITANAS DE CUIABA\',1,4,1,now()),
            (21811,\'FACULDADE PAIVA ANDRADE\',1,4,1,now()),
            (21812,\'FACULDADE REGIONAL DE LEOPOLDINA\',1,4,1,now()),
            (21814,\'INSTITUTO DE PESQUISAS ENSINO E GESTAO EM SAUDE\',1,4,1,now()),
            (21819,\'FACULDADE COSMOS DE MANAUS\',1,4,1,now()),
            (21821,\'FACULDADE DE TECNOLOGIA SENAC MARINGA\',1,4,1,now()),
            (21822,\'FACULDADE TORRICELLI\',1,4,1,now()),
            (21826,\'ESCOLA SUPERIOR DE EMPREENDEDORISMO SEBRAESP\',1,4,1,now()),
            (21827,\'INSTITUTO FRIBURGO DE ENSINO SUPERIOR\',1,4,1,now()),
            (21833,\'FACULDADE ANHANGUERA DE MOGI GUACU\',1,4,1,now()),
            (21834,\'FACULDADE ANHANGUERA DE MARILIA\',1,4,1,now()),
            (21847,\'FACULDADE MEDUCAR\',1,4,1,now()),
            (21869,\'FACULDADE RACHEL DE QUEIROZ\',1,4,1,now()),
            (21871,\'FACULDADE BAHIANA DE ENGENHARIA E CIENCIAS SOCIAIS APLICADAS\',1,4,1,now()),
            (21872,\'FACULDADE CENBRAP\',1,4,1,now()),
            (21873,\'FACULDADE TECNOLOGICA FALCAO\',1,4,1,now()),
            (21876,\'EJ FACULDADE DE TECNOLOGIA EM AVIACAO CIVIL\',1,4,1,now()),
            (21877,\'FACULDADE INTEGRADA DA AMAZONIA\',1,4,1,now()),
            (21878,\'FACULDADE METROPOLITANA DE FLORIANOPOLIS\',1,4,1,now()),
            (21882,\'FACULDADE PITAGORAS DE ALTAMIRA\',1,4,1,now()),
            (21886,\'FACULDADE PITAGORAS DE SERRINHA\',1,4,1,now()),
            (21888,\'FACULDADE REHAGRO\',1,4,1,now()),
            (21892,\'CENTRO DE ENSINO SUPERIOR DE PALMAS\',1,4,1,now()),
            (21895,\'FACULDADE MAURICIO DE NASSAU DE CAMPOS DOS GOYTACAZES\',1,4,1,now()),
            (21896,\'FACULDADE MAURICIO DE NASSAU DE DIVINOPOLIS\',1,4,1,now()),
            (21897,\'FACULDADE MAURICIO DE NASSAU DE PONTA GROSSA\',1,4,1,now()),
            (21900,\'FACULDADE ANHANGUERA DE CATANDUVA\',1,4,1,now()),
            (21903,\'FACULDADE PITAGORAS DE POUSO ALEGRE\',1,4,1,now()),
            (21904,\'FACULDADE MAURICIO DE NASSAU DE VOLTA REDONDA\',1,4,1,now()),
            (21906,\'FACULDADE METROPOLITANA DO CEARA\',1,4,1,now()),
            (21907,\'FACULDADE PITAGORAS DE TIANGUA CE\',1,4,1,now()),
            (21921,\'FACULDADE DE ENSINO SUPERIOR DE PARNAIBA\',1,4,1,now()),
            (21924,\'FACULDADE ANHANGUERA DE ASSIS\',1,4,1,now()),
            (21931,\'FACULDADE UNA DE JATAI\',1,4,1,now()),
            (21932,\'INSTITUTO UNA DE JATAI\',1,4,1,now()),
            (21937,\'FACULDADE INTEGRADA DE CAMPO GRANDE\',1,4,1,now()),
            (21938,\'FACULDADE METROPOLITANA DE CAMAQUA\',1,4,1,now()),
            (21940,\'FACULDADE PHORTE DE EDUCACAO E TECNOLOGIA\',1,4,1,now()),
            (21949,\'INSTITUTO DE EDUCACAO SUPERIOR LATINOAMERICANO\',1,4,1,now()),
            (21950,\'FACULDADE UNINORTE TUCURUI\',1,4,1,now()),
            (21951,\'FACULDADE POSITIVO JOINVILLE\',1,4,1,now()),
            (21952,\'FGV / ESCOLA DE RELACOES INTERNACIONAIS\',1,4,1,now()),
            (21953,\'IUFA ? INSTITUTO UNIAO DAS FACULDADES AMERICANAS\',1,4,1,now()),
            (21955,\'FACULDADE METROPOLITANA DE ITAJAI\',1,4,1,now()),
            (21956,\'FACULDADE METROPOLITANA DE PALHOCA\',1,4,1,now()),
            (21957,\'FACULDADE METROPOLITANA DE LAGES\',1,4,1,now()),
            (21977,\'FACULDADE POLIENSINO FP\',1,4,1,now()),
            (21982,\'FACULDADE INTEGRADA CETE\',1,4,1,now()),
            (21983,\'FACULDADE MORUMBI\',1,4,1,now()),
            (21992,\'FACULDADE GUAIRACA DE PRUDENTOPOLIS\',1,4,1,now()),
            (21993,\'FACULDADE UNINTA IGUATU\',1,4,1,now()),
            (21995,\'FACULDADE DE TECNOLOGIA SENAC CURITIBA\',1,4,1,now()),
            (22000,\'FACULDADE METROPOLITANA DO LITORAL RIO GRANDENSE\',1,4,1,now()),
            (22015,\'FACULDADE MUNICIPAL DE EDUCACAO E MEIO AMBIENTE\',1,3,1,now()),
            (22020,\'ESCOLA MUNICIPAL DE GESTAO DO LEGISLATIVO\',2,3,1,now()),
            (22021,\'FACULDADE SAO PAULO DE PRESIDENTE VENCESLAU\',1,4,1,now()),
            (22059,\'FACULDADE PITAGORAS DE MEDICINA DE EUNAPOLIS\',1,4,1,now()),
            (22073,\'FACULDADE MACEDO DE AMORIM\',1,4,1,now()),
            (22074,\'FACULDADE METROPOLITANA NORTE RIOGRANDENSE\',1,4,1,now()),
            (22075,\'FACULDADE VALE DO PAJEU\',1,4,1,now()),
            (22076,\'FACULDADE ESTACIO DE ALAGOINHAS\',1,4,1,now()),
            (22086,\'FACULDADE DE EDUCACAO SOCIAL DA BAHIA\',1,4,1,now()),
            (22088,\'FACULDADE SANTO AGOSTINHO DE ITABUNA\',1,4,1,now()),
            (22089,\'INSTED INSTITUTO AVANCADO DE ENSINO SUPERIOR E DESENVOLVIMENTO HUMANO\',1,4,1,now()),
            (22095,\'FACULDADE CESUMAR DE CAMPO GRANDE\',1,4,1,now()),
            (22098,\'FACULDADE ISMD\',1,4,1,now()),
            (22099,\'FACULDADE BELAS ARTES DE SAO PAULO\',2,4,1,now()),
            (22100,\'FACULDADE DE DIREITO 8 DE JULHO\',1,4,1,now()),
            (22101,\'FACULDADE DE EDUCACAO DE PATOS DE MINAS\',1,4,1,now()),
            (22102,\'FACULDADE DE TECNOLOGIA SENAC CURITIBA PORTAO\',1,4,1,now()),
            (22103,\'FACULDADE SANTA CASA DE BELO HORIZONTE\',1,4,1,now()),
            (22104,\'FACULDADES INTEGRADAS PADRAO\',1,4,1,now()),
            (22107,\'FACULDADE PITAGORAS DE ITUMBIARA\',1,4,1,now()),
            (22109,\'FACULDADE PITAGORAS DE PIRIPIRI\',1,4,1,now()),
            (22112,\'FACULDADE PITAGORAS DE ARACATI\',1,4,1,now()),
            (22113,\'FACULDADE PITAGORAS ANHANGUERA DE SANTA CRUZ DO SUL\',1,4,1,now()),
            (22116,\'FACULDADE DE MIGUEL PEREIRA\',1,4,1,now()),
            (22119,\'FACULDADE AMERICA DE VITORIA\',1,4,1,now()),
            (22121,\'FACULDADE DE CIENCIAS MEDICAS DE TRES RIOS\',1,4,1,now()),
            (22123,\'FACULDADE DE CIENCIAS JURIDICAS DE ARAPIRACA\',1,4,1,now()),
            (22124,\'FACULDADE DE CIENCIAS JURIDICAS DE BRUMADO\',1,4,1,now()),
            (22126,\'FACULDADE DE CIENCIAS JURIDICAS DE MARABA\',1,4,1,now()),
            (22127,\'FACULDADE DE CIENCIAS JURIDICAS DE JEQUIE\',1,4,1,now()),
            (22128,\'FACULDADE DE CIENCIAS JURIDICAS DE CAMPINA GRANDE\',1,4,1,now()),
            (22129,\'FACULDADE DE CIENCIAS JURIDICAS DE JUIZ DE FORA\',1,4,1,now()),
            (22130,\'FACULDADE DE CIENCIAS JURIDICAS DE TUCURUI\',1,4,1,now()),
            (22131,\'CENTRO DE ENSINO SUPERIOR DO TOCANTINS\',1,4,1,now()),
            (22134,\'FACULDADE DE CIENCIAS JURIDICAS DE SERRA\',1,4,1,now()),
            (22135,\'FACULDADE DE CIENCIAS JURIDICAS DE IRECE\',1,4,1,now()),
            (22136,\'FACULDADE DE CIENCIAS JURIDICAS DE ITABIRA\',1,4,1,now()),
            (22140,\'FACULDADE DE CIENCIAS JURIDICAS DE URUGUAIANA\',1,4,1,now()),
            (22143,\'FACULDADE DE CIENCIAS JURIDICAS DE SAO JOSE DO RIO PRETO\',1,4,1,now()),
            (22144,\'FACULDADE DE CIENCIAS JURIDICAS DE LUZIANIA\',1,4,1,now()),
            (22145,\'FACULDADE DE CIENCIAS JURIDICAS DE ERECHIM\',1,4,1,now()),
            (22149,\'FACULDADE DE CIENCIAS JURIDICAS DE FRANCA\',1,4,1,now()),
            (22150,\'FACULDADE DE CIENCIAS JURIDICAS DE RIBEIRAO DAS NEVES\',1,4,1,now()),
            (22151,\'FACULDADE DE CIENCIAS JURIDICAS DE RIO BRANCO\',1,4,1,now()),
            (22152,\'FACULDADE DE CIENCIAS JURIDICAS DE SANTO ANTONIO DE JESUS\',1,4,1,now()),
            (22153,\'FACULDADE DE CIENCIAS JURIDICAS DE GUANAMBI\',1,4,1,now()),
            (22155,\'FACULDADE DE CIENCIAS JURIDICAS DE TIANGUA\',1,4,1,now()),
            (22157,\'FACULDADE DE CIENCIAS JURIDICAS DE SERRINHA\',1,4,1,now()),
            (22158,\'FACULDADE DE CIENCIAS JURIDICAS DE PETROLINA\',1,4,1,now()),
            (22161,\'FACULDADE DE CIENCIAS JURIDICAS DE ITUMBIARA\',1,4,1,now()),
            (22168,\'FACULDADE DE CIENCIAS JURIDICAS DE SANTA CRUZ DO SUL\',1,4,1,now()),
            (22169,\'FACULDADE DE CIENCIAS JURIDICAS DE MARILIA\',1,4,1,now()),
            (22170,\'FACULDADE DE CIENCIAS JURIDICAS DE MOGI GUACU\',1,4,1,now()),
            (22175,\'FACULDADE SAO JOAQUIM DA BARRA\',1,4,1,now()),
            (22176,\'FACULDADE ENAU\',1,4,1,now()),
            (22179,\'FACULDADE PITAGORAS ANHANGUERA DE SAO JOAO DA BOA VISTA\',1,4,1,now()),
            (22183,\'FACULDADE PITAGORAS DE CRUZ DAS ALMAS\',1,4,1,now()),
            (22184,\'FACULDADE DE CIENCIAS JURIDICAS DE RIO VERDE\',1,4,1,now()),
            (22190,\'FACULDADE DE CIENCIAS JURIDICAS DE SAO JOAO DA BOA VISTA\',1,4,1,now()),
            (22191,\'FACULDADE ESTACIO DE JARAGUA DO SUL\',1,4,1,now()),
            (22194,\'FACULDADE ATENAS SETE LAGOAS\',1,4,1,now()),
            (22197,\'FACULDADE ATENAS PASSOS\',1,4,1,now()),
            (22199,\'INSTITUTO DE EDUCACAO SUPERIOR SANTO AGOSTINHO\',1,4,1,now()),
            (22202,\'FACULDADE ESTACIO DE JUAZEIRO\',1,4,1,now()),
            (22204,\'FACULDADE DE MATUPA\',1,4,1,now()),
            (22210,\'FACULDADE MAURICIO DE NASSAU SERRA TALHADA\',1,4,1,now()),
            (22215,\'FACULDADE UNIVERITAS UNIVERSUS VERITAS DE NOVA IGUACU\',1,4,1,now()),
            (22217,\'FACULDADE UNIVERITAS UNIVERSUS VERITAS DE RIBEIRAO PRETO\',1,4,1,now()),
            (22219,\'FACULDADE UNIVERITAS UNIVERSUS VERITAS DE CONTAGEM\',1,4,1,now()),
            (22225,\'FACULDADE DE CIENCIAS JURIDICAS DE EUNAPOLIS\',1,4,1,now()),
            (22226,\'FACULDADE DE CIENCIAS JURIDICAS DE PARAGOMINAS\',1,4,1,now()),
            (22227,\'FACULDADE DE CIENCIAS JURIDICAS DE ALAGOINHAS\',1,4,1,now()),
            (22228,\'FACULDADE DE CIENCIAS JURIDICAS DE CATANDUVA\',1,4,1,now()),
            (22229,\'FACULDADE DE CIENCIAS JURIDICAS DE ITAPEVA\',1,4,1,now()),
            (22235,\'FACULDADE DE CIENCIAS JURIDICAS DE POUSO ALEGRE\',1,4,1,now()),
            (22236,\'FACULDADE DE CIENCIAS JURIDICAS DE SETE LAGOAS\',1,4,1,now()),
            (22239,\'FACULDADE INTEGRADA DE ADVOCACIA DA AMAZONIA\',1,4,1,now()),
            (22245,\'FACULDADE DO CARIRI PARAIBANO\',1,4,1,now()),
            (22248,\'FACULDADE SUCESSO\',1,4,1,now()),
            (22249,\'FACULDADE DE DIREITO ATAME\',1,4,1,now()),
            (22257,\'FACULDADE DE DIREITO AVANTIS DE ITAPEMA\',1,4,1,now()),
            (22263,\'FACULDADE VANGUARDA\',1,4,1,now()),
            (22266,\'INSTITUTO DE DESENVOLVIMENTO TECNOLOGICO DA FGV\',1,4,1,now()),
            (22267,\'FACULDADE HONPAR\',1,4,1,now()),
            (22311,\'FACULDADE NOVE DE JULHO DE SAO BERNARDO DO CAMPO\',1,4,1,now()),
            (22312,\'FACULDADE NOVE DE JULHO DE OSASCO\',1,4,1,now()),
            (22313,\'FACULDADE NOVE DE JULHO DE BAURU\',1,4,1,now()),
            (22316,\'FACULDADE NOVE DE JULHO MAUA\',1,4,1,now()),
            (22317,\'ESCOLA SUPERIOR DA AMAZONIA DE ABAETETUBA\',1,4,1,now()),
            (22321,\'INSTITUTO SANTO AGOSTINHO DE ENSINO SUPERIOR ISA\',1,4,1,now()),
            (22325,\'FACULDADE DE DIREITO CHRISTUS\',1,4,1,now()),
            (22326,\'FACULDADE REEDUCAR DE BRASILIA\',1,4,1,now()),
            (22327,\'FACULDADE SAO TOMAS DE AQUINO DE NOVA LIMA\',1,4,1,now()),
            (22420,\'FACULDADE UNIRB MACEIO\',1,4,1,now()),
            (22422,\'FUNDACAO DOM CABRAL\',2,4,1,now()),
            (22463,\'FACULDADE IMPACTO DE PORANGATU\',1,4,1,now()),
            (22514,\'FACULDADE TIRADENTES DE JABOATAO DOS GUARARAPES\',1,4,1,now()),
            (22603,\'FACULDADE ZONA LESTE\',1,4,1,now()),
            (22685,\'CENTRO DE MEDICINA ESPECIALIZADA PESQUISA E ENSINO\',2,4,1,now()),
            (22930,\'CENTRO DE ENSINO E PESQUISA DO PRO CARDIACO\',2,4,1,now()),
            (23318,\'FACULDADE BRASILEIRA DE CACHOEIRO\',1,4,1,now()),
            (23352,\'INSTITUTO PROFESSOR FLAVIO VELLINI\',2,4,1,now()),
            (23410,\'UNIVERSIDADE ESTADUAL DA REGIAO TOCANTINA DO MARANHAO\',1,2,1,now()),
            (23438,\'FACULDADE DE TECNOLOGIA DE ARARAS\',1,2,1,now()),
            (23459,\'FACULDADE DE TECNOLOGIA DE ADAMANTINA\',1,2,1,now()),
            (23700,\'FACULDADE DE TECNOLOGIA DE FERRAZ DE VASCONCELOS\',1,2,1,now()),
            (23705,\'FACULDADE DE TECNOLOGIA DE FRANCO DA ROCHA\',1,2,1,now()),
            (23713,\'FACULDADE DE EDUCACAO TECNOLOGICA BARRA MANSA\',1,2,1,now()),
            (23725,\'ESCOLA SUPERIOR DE GESTAO\',1,2,1,now()),
            (24462,\'CENTRO DE EDUCACAO TECNOLOGICO DA FUNDACAO INDAIATUBANA DE EDUCACAO E CULTURA\',1,3,1,now());     
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
