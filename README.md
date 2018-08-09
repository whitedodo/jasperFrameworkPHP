## [JasperFramework with PHP - Project]

#### 작성자 소개(About the author)
> ##### 1. Dodo (rabbit.white@daum.net)
> ##### 2. Created by: 2017-12-30
> ##### 3. Description: 
> ###### 3-1. 2018-08-07 ~ 2018-08-08 / Jasper / Database is configured with pure PHP removed.(데이터베이스를 제거한 순수한 PHP로 구성함.)
> ###### 3-2. 2018-08-07 ~ 2018-08-08 / Jasper / 카테고리 항목 - 3단계 구성.(재귀 구조로 구현) / Category items - 3-step configuration (implemented as recursive structure)
> ###### 3-3. 2018-08-07 ~ 2018-08-08 / Jasper / URL 짧은 주소 추가(.htaccess) / Add URL Short Address (.htaccess)
> ###### 3-4. 2018-08-07 ~ 2018-08-08 / Jasper / Apache 2.2, PHP 5.2~5.6를 지원함. / Supports Apache 2.2, PHP 5.2 to 5.6.
> ###### 3-5. 2018-08-09 / Jasper / CSV - 뷰어 기능 추가
> ##### 4. License: MIT License.

#### 빌드(Build)
> ##### 1. Apache 2, PHP 5.2 환경에 넣어서 사용하면 된다.(Can be used in Apache 2, PHP 5.2 environment.)
> ##### 2. index.php 파일을 열어서 환경 설정을 한다.(Open the index.php file to configure the environment.)
       - 윈도우(Windows)
       $root = "C:/{webRootDir}/htdocs";
       $directories = '{폴더명 / 없으면 생략}';
       - 리눅스(Linux)
       $root = '/usr/{경로명}/{계정명}';
       $directories = '{폴더명 / 없으면 생략}';
       - 사용자 디렉토리( http:// {주소} /~{계정명} )
       $directories = '{폴더명 / 없으면 생략}';
       $directories = '{~계정명}';

#### Quick Start(쉬운 시작)
> ##### 1. index.php 파일에서 환경설정을 하면 된다. / Jasper / 2018-08-08
        (You can configure the index.php file.)
> ##### 2. controller의 homepage 클래스에서 카테고리 등만 조작하면 된다. / Jasper / 2018-08-08
        (You only need to operate categories in the controller's homepage class.)
> ##### 3. Tree 구조의 카테고리 사용방법은 다음과 같이 사용할 수 있다. / Jasper / 2018-08-08
        (The method of using categories in a tree structure can be used as follows)
        전체 출력(Full Print) -> $this->getTreeCategories( NULL, 'wide' );
        깊이별 출력(Depth Print) -> $this->getTreeCategories( DepthID(깊이), 2 );
> ##### 4. CSV 기능 사용방법(How to Use the CSV Function) / Jasper / 2018-08-09
        일반 / CSV 출력(General CSV Print) -> $jFunction->csvToViewer("./경로/파일명.csv");
        * (예 - ) 학교 수업료 등 출력(Specific to School Pay Print) -> $jFunction->csvToSchoolPay("./경로/파일명.csv");
