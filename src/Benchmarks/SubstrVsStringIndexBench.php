<?php

declare(strict_types=1);

namespace Benchmarks\Benchmarks;

use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 * @Revs(1000)
 * @Iterations(8)
 * @OutputTimeUnit("milliseconds", precision=10)
 */
final class SubstrVsStringIndexBench
{
    public function benchCheckIfStringTrailingWithBackslashStringIndexShort(): void
    {
        $testedString = self::getShortString();
        $result = $testedString[strlen($testedString) - 1] === '/';
    }

    public function benchCheckIfStringTrailingWithBackslashSubstrShor(): void
    {
        $testedString = self::getShortString();
        $result = substr($testedString, -1) === '/';
    }

    public function benchCheckIfStringTrailingWithBackslashStringIndexLong(): void
    {
        $testedString = self::getLongString();
        $result = $testedString[strlen($testedString) - 1] === '/';
    }

    public function benchCheckIfStringTrailingWithBackslashSubstrLong(): void
    {
        $testedString = self::getLongString();
        $result = substr($testedString, -1) === '/';
    }

    private static function getShortString(): string
    {
        return '123/';
    }

    private static function getLongString(): string
    {
        return <<<'STRING'
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra maecenas accumsan lacus vel facilisis volutpat. Ut sem nulla pharetra diam sit amet nisl suscipit adipiscing. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Eleifend donec pretium vulputate sapien nec. Quis auctor elit sed vulputate mi sit amet. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Id consectetur purus ut faucibus. Et netus et malesuada fames ac. In mollis nunc sed id semper. Metus aliquam eleifend mi in nulla posuere sollicitudin. Felis imperdiet proin fermentum leo vel orci. Euismod lacinia at quis risus sed. Nibh mauris cursus mattis molestie. Suspendisse sed nisi lacus sed viverra tellus. Vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor. Quis eleifend quam adipiscing vitae. Quisque egestas diam in arcu cursus. Nisl nisi scelerisque eu ultrices vitae auctor eu augue ut. Euismod quis viverra nibh cras pulvinar mattis. Ultricies mi quis hendrerit dolor magna eget est lorem. Eget nunc lobortis mattis aliquam faucibus purus. Turpis nunc eget lorem dolor sed viverra. Orci nulla pellentesque dignissim enim. Proin sagittis nisl rhoncus mattis rhoncus urna neque viverra. Lorem sed risus ultricies tristique nulla aliquet enim tortor at. At risus viverra adipiscing at. Dignissim sodales ut eu sem integer vitae. Dapibus ultrices in iaculis nunc sed augue lacus. In pellentesque massa placerat duis ultricies lacus. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Nisl nisi scelerisque eu ultrices vitae. Tellus molestie nunc non blandit massa enim. Sit amet volutpat consequat mauris nunc congue. Maecenas pharetra convallis posuere morbi leo urna molestie at. Amet consectetur adipiscing elit duis tristique sollicitudin nibh. In aliquam sem fringilla ut. Fermentum leo vel orci porta. Consequat nisl vel pretium lectus quam id leo in vitae. Amet volutpat consequat mauris nunc congue nisi. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh. Imperdiet sed euismod nisi porta lorem mollis aliquam. In tellus integer feugiat scelerisque. Sit amet consectetur adipiscing elit duis tristique sollicitudin. In ante metus dictum at. Erat velit scelerisque in dictum non consectetur a. Sit amet luctus venenatis lectus. Leo duis ut diam quam nulla porttitor massa id neque. Sed vulputate mi sit amet mauris commodo. Fringilla est ullamcorper eget nulla facilisi etiam dignissim diam. Mi proin sed libero enim sed faucibus turpis in. Mi in nulla posuere sollicitudin. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Eget mauris pharetra et ultrices. Auctor elit sed vulputate mi. Lacus laoreet non curabitur gravida arcu ac tortor. Nunc sed blandit libero volutpat sed. Nunc non blandit massa enim nec. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi. Vitae semper quis lectus nulla at volutpat diam ut. Porta lorem mollis aliquam ut porttitor leo a diam sollicitudin. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Enim eu turpis egestas pretium aenean pharetra magna. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Quis commodo odio aenean sed. At risus viverra adipiscing at in tellus integer. Id porta nibh venenatis cras sed felis. Dolor sit amet consectetur adipiscing elit ut aliquam. Ut tristique et egestas quis ipsum. Mi quis hendrerit dolor magna eget est lorem. Fermentum et sollicitudin ac orci phasellus. Mauris pharetra et ultrices neque ornare aenean euismod elementum. Felis imperdiet proin fermentum leo. Lacus vestibulum sed arcu non. Faucibus a pellentesque sit amet porttitor eget dolor morbi non. Id aliquet risus feugiat in ante metus dictum at tempor. Tellus molestie nunc non blandit. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Diam vulputate ut pharetra sit. Cursus turpis massa tincidunt dui ut. Platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Risus in hendrerit gravida rutrum quisque non. Diam ut venenatis tellus in metus vulputate eu. Lectus urna duis convallis convallis tellus id. Tempor commodo ullamcorper a lacus vestibulum sed. Lectus vestibulum mattis ullamcorper velit sed. Non sodales neque sodales ut. Neque convallis a cras semper auctor neque vitae. Aliquam sem et tortor consequat id. Sed elementum tempus egestas sed sed risus pretium quam vulputate. In aliquam sem fringilla ut morbi tincidunt augue interdum. Risus pretium quam vulputate dignissim suspendisse in est ante. Cras sed felis eget velit aliquet sagittis id consectetur. In cursus turpis massa tincidunt dui. Nec sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Sit amet mauris commodo quis imperdiet massa. A arcu cursus vitae congue mauris rhoncus aenean vel elit. Egestas purus viverra accumsan in nisl nisi scelerisque eu ultrices. Ornare quam viverra orci sagittis eu. Auctor urna nunc id cursus metus aliquam eleifend mi.
STRING;
    }
}
