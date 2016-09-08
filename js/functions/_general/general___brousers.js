function general___browser()
{
    var ua = navigator.userAgent;
   
    if (ua.search(/MSIE/) > 0) return 'IE';
    if (ua.search(/Firefox/) > 0) return 'Firefox';
    if (ua.search(/Opera/) > 0) return 'Opera';
    if (ua.search(/Chrome/) > 0) return 'Google Chrome';
    if (ua.search(/Safari/) > 0) return 'Safari';
    if (ua.search(/Konqueror/) > 0) return 'Konqueror';
    if (ua.search(/Iceweasel/) > 0) return 'Debian Iceweasel';
    if (ua.search(/SeaMonkey/) > 0) return 'SeaMonkey';
 
    // ��������� ����� �����, ��� ��������� ������ ���, Gecko ����� ����� �����������
    if (ua.search(/Gecko/) > 0) return 'Gecko';

    // � ����� ��� ������ ��������� �����
    return 'Search Bot';
}